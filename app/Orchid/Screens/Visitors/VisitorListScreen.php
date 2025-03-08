<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Visitors;

use App\Models\Visitor;
use App\Orchid\Filters\DateRangeFilter;
use App\Orchid\Filters\SiteFilter;
use App\Orchid\Layouts\Examples\ChartLineExample;
use App\Orchid\Layouts\Visitor\VisitorListLayout;
use App\Orchid\Layouts\VisitorSelection;
use Illuminate\Support\Facades\DB;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

class VisitorListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        $baseQuery = Visitor::filters([SiteFilter::class, DateRangeFilter::class]);

        $visitsBySiteAndDay = (clone $baseQuery)->selectRaw('site, DATE(at) as date, COUNT(*) as count')
            ->groupBy('site', DB::raw('DATE(at)'))
            ->get();

        foreach ($visitsBySiteAndDay as $v) {
            $chartData[$v->site]['name'] = $v->site;
            $chartData[$v->site]['labels'] = $v->date;
            $chartData[$v->site]['values'] = $v->count;
        }

        $minDate = null;
        $maxDate = null;
        $m = [];
        $chartData = [];
        foreach ($visitsBySiteAndDay as $v) {
            $m[$v->site][$v->date] = $v->count;

            $d = new \DateTime($v->date);
            if ($minDate === null || $d < $minDate) {
                $minDate = $d;
            }

            if ($maxDate === null || $d > $maxDate) {
                $maxDate = $d;
            }
        }

        foreach ($m as $k => $item) {
            $c = [];
            $c['name'] = $k;
            $period = new \DatePeriod($minDate, new \DateInterval('P1D'), $maxDate);
            foreach ($period as $date) {
                $f = $date->format('Y-m-d');
                $c['labels'][] = $f;
                $c['values'][] = $item[$f] ?? 0;
            }
            $chartData[] = $c;
        }

        return [
            'charts'  => $chartData,
            'metrics' => [
                'uid'  => ['value' => number_format((clone $baseQuery)->distinct('uid')->count('uid'))],
                'vid' => ['value' => number_format((clone $baseQuery)->distinct('vid')->count('vid'))],
                'site' => ['value' => number_format((clone $baseQuery)->distinct('site')->count('site'))],
                'total' => number_format((clone $baseQuery)->count()),
            ],
            'visitors' => $baseQuery
                ->defaultSort('at', 'desc')
                ->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     */
    public function name(): ?string
    {
        return 'Visitor list';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
    {
        return 'Visitors list.';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.systems.users',
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return string[]|\Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            ChartLineExample::make('charts', 'Visits'),

            Layout::metrics([
                'Unique visitors' => 'metrics.uid',
                'Unique visits' => 'metrics.vid',
                'Domains' => 'metrics.site',
                'Total visits' => 'metrics.total',
            ]),
            VisitorSelection::class,
            VisitorListLayout::class,
        ];
    }
}
