<?php

namespace App\Http\Livewire\Legenditems;

use App\Models\LegendItem;
use LaravelViews\Views\TableView;
use App\Http\Livewire\LegendItems\Actions\EditLegendAction;
use App\Http\Livewire\Legenditems\Actions\SoftDeleteLegendAction;
use App\Http\Livewire\Tournaments\Actions\SoftDeleteTournamentAction;

class LegenditemsTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = LegendItem::class;

    public $searchBy = [
        'shortcut',
        'name'
    ];

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            __('legend_items.attributes.shortcut'),
            __('legend_items.attributes.name'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->shortcut,
            $model->name,
        ];
    }

    protected function actionsByRow()
    {
        return [
            new EditLegendAction('legend_items.edit', __('Edytuj')),
            new SoftDeleteTournamentAction(),
        ];
    }
}
