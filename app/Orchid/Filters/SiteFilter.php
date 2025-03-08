<?php

declare(strict_types=1);

namespace App\Orchid\Filters;

use App\Models\Visitor;
use Illuminate\Database\Eloquent\Builder;
use Orchid\Filters\Filter;
use Orchid\Screen\Fields\Select;

class SiteFilter extends Filter
{
    public function name(): string
    {
        return __('Site');
    }

    public function parameters(): array
    {
        return ['site'];
    }

    public function run(Builder $builder): Builder
    {
        return $builder->where('site', $this->request->get('site'));
    }

    /**
     * Get the display fields.
     */
    public function display(): array
    {
        return [
            Select::make('site')
                ->fromModel(Visitor::class, 'site', 'site')
                ->empty()
                ->value($this->request->get('site'))
                ->title(__('Site')),
        ];
    }

    public function value(): string
    {
        return $this->name().': '. $this->request->get('site');
    }
}
