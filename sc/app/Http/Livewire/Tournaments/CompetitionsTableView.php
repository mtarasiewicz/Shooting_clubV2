<?php

namespace App\Http\Livewire\Tournaments;

use App\Models\Tournament;
use WireUi\Traits\Actions;
use App\Models\Competition;
use LaravelViews\Views\TableView;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Tournaments\Actions\RemoveCompetitionAction;
use App\Models\CompetitionTournament;

class CompetitionsTableView extends TableView
{
    use Actions;
    public $tournament;

    /**
     * Sets a initial query with the data to fill the table
     *
     * @return Builder Eloquent query
     */
    public function repository(): Builder
    {
        return CompetitionTournament::where('tournament_id', $this->tournament->id)->get()->toQuery();
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
    public function row(CompetitionTournament $competitionTournament): array
    {
        // dd($competitionTournament->competition);
        return [
            $competitionTournament->competition->name,
            $competitionTournament->competition->description,
        ];
    }

    protected function actionsByRow()
    {
        return [
            new RemoveCompetitionAction()
        ];
    }
}
