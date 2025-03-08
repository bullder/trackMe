<?php

declare(strict_types=1);

namespace App\Orchid\Filters;

use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Fields\DateRange;

class DateRangeFilter extends Filter
{
    public function name(): string
    {
        return __('Date Range');
    }

    public function parameters(): array
    {
        return ['date.start', 'date.end'];
    }

    public function isApply(): bool
    {
        $q = $this->request->get('date');
        if (is_array($q)) {
            return !empty($q['start']) && !empty($q['end']) && parent::isApply();
        }

        return parent::isApply();
    }

    public function run(Builder $builder): Builder
    {
        $at = [
            date($this->request->get('date')['start']),
            date($this->request->get('date')['end'])
        ];

        return $builder->whereBetween('at', $at);
    }

    public function display(): array
    {
        $dateRange = [];

        $q = $this->request->get('date');
        if (is_array($q) && !empty($q['start']) && !empty($q['end'])) {
            $dateRange = [
                'start' =>  date($q['start']),
                'end' =>  date($q['end'])
            ];
        }

        return [
            DateRange::make('date')
                ->value($dateRange)
                ->title(__('Date range')),
        ];
    }

    public function value(): string
    {
        return $this->name().': '. $this->request->get('date')['start'] . ':' . $this->request->get('date')['end'];
    }
}
