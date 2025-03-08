<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Visitor;

use App\Models\User;
use App\Models\Visitor;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Persona;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class VisitorListLayout extends Table
{
    /**
     * @var string
     */
    public $target = 'visitors';

    /**
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('at', __('Time'))
                ->usingComponent(DateTimeSplit::class)
                ->cantHide()
                ->sort(),
            TD::make('uid', __('UserID')),
            TD::make('vid', __('VisitID')),
            TD::make('site', __('Site')),
            TD::make('ip', __('IP'))->defaultHidden(),
            TD::make('url', __('URL'))->defaultHidden(),
            TD::make('agent', __('Agent'))->defaultHidden(),

        ];
    }
}
