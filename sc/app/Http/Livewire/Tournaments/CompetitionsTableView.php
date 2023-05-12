<?php

namespace App\Http\Livewire\Tournaments;

use App\Models\Competition;
use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;

class CompetitionsTableView extends TableView
{
    public $tournament;

        /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return $this->tournament->competitions()->get()->toQuery();
    }

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
    public function row(Competition $competition): array
    {
        return [
            $competition->name,
            $competition->description
        ];
    }
}
