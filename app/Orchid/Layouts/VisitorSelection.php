<?php

namespace App\Orchid\Layouts;

use App\Orchid\Filters\DateRangeFilter;
use App\Orchid\Filters\SiteFilter;
use Orchid\Filters\Filter;
use Orchid\Screen\Layouts\Selection;

class VisitorSelection extends Selection
{
    /**
     * @return Filter[]
     */
    public function filters(): iterable
    {
        return [
            SiteFilter::class,
            DateRangeFilter::class
        ];
    }
}
