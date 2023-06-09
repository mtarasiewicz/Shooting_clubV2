<?php

namespace App\Http\Livewire\Tournaments;

use App\Models\Tournament;
use WireUi\Traits\Actions;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Tournaments\Actions\EditTournamentAction;
use App\Http\Livewire\Tournaments\Actions\ViewParticipantsAction;
use App\Http\Livewire\Tournaments\Actions\SoftDeleteTournamentAction;

class TournamentsTableView extends TableView
{
    use Actions;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Tournament::class;

    public $searchBy = [
        'date',
        'name',
        'venue',
        'competitions',
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
            __('tournaments.attributes.date'),
            __('tournaments.attributes.name'),
            __('tournaments.attributes.venue'),
            __('tournaments.attributes.competitions'),
            __('tournaments.attributes.description'),
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
            $model->date,
            $model->name,
            $model->venue,
            $model->competitions,
            $model->description,
        ];
    }

    protected function actionsByRow()
    {
        return [
            new EditTournamentAction('tournaments.edit', __('translation.actions.edit')),
            new SoftDeleteTournamentAction('tournaments.delete', __('translation.actions.delete')),
            new ViewParticipantsAction('participants', __('translation.actions.participants'))
        ];
    }

    public function softDelete(int $id)
    {
        dd($id);
        // $tournament = Tournament::find($id);
        // $tournament -> delete();
        // $this->notification()->success(
        //     $title = __('translation.messages.success.destroy_title'),
        //     $description = __('tournaments.messages.success.destroy',[
        //         'name'=>$tournament->name,
        //     ])
        // );
    }
}
