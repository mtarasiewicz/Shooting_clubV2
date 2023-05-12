<?php

namespace App\Http\Livewire\Competitions;

use WireUi\Traits\Actions;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Traits\Restore;
use App\Http\Livewire\Traits\SoftDelete;
use App\Models\Competition;

class CompetitionsTableView extends TableView
{
    use Actions;
    use SoftDelete;
    use Restore;

    /**
     * Sets a model class to get the initial data
     */
    protected $model = Competition::class;

    public $searchBy = [
        'name',
        'description'
    ];

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            __('competitions.attributes.name'),
            __('competitions.attributes.description'),
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
            $model->name,
            $model->description,
        ];
    }
}
