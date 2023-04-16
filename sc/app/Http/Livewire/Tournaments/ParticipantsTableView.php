<?php

namespace App\Http\Livewire\Tournaments;

use App\Models\User;
use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;

class ParticipantsTableView extends TableView
{
    public $tournament;

    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return $this->tournament->participants()->get()->toQuery();
    }

    public $searchBy = [
        'name',
        'clubName'
    ];

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            __('users.attributes.name'),
            __('users.attributes.clubName'),
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row(User $user): array
    {
        return [
            $user -> name,
            $user -> clubName
        ];
    }
}
