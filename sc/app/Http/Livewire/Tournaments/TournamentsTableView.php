<?php

namespace App\Http\Livewire\Tournaments;

use App\Models\Tournament;
use WireUi\Traits\Actions;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Traits\Restore;
use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Tournaments\Actions\EditTournamentAction;
use App\Http\Livewire\Tournaments\Actions\ViewParticipantsAction;
use App\Http\Livewire\Tournaments\Actions\RestoreTournamentAction;
use App\Http\Livewire\Tournaments\Actions\SoftDeleteTournamentAction;
use App\Http\Livewire\Tournaments\Actions\ViewCompetitionsAction;

class TournamentsTableView extends TableView
{
    use Actions;
    use SoftDelete;
    use Restore;
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

    public function repository(): Builder
    {
        {
            $query = Tournament::query();
            if(request()->user()->can('create', Tournament::class))
            {
                $query->withTrashed();
            }
            return $query;
        }
    }

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
            new SoftDeleteTournamentAction(),
            new RestoreTournamentAction(),
            new ViewParticipantsAction('participants', __('translation.actions.participants')),
            new ViewCompetitionsAction('tournamentCompetitions', __('translation.actions.competitions'))
        ];
    }

    protected function softDeleteNotificationDescription(Model $model)
    {
        return __('tournaments.messages.successes.destroy_title',[
            'name'=>$model
        ]);
    }

    protected function restoreNotificationDescription(Model $model)
    {
        return __('tournaments.messages.successes.restore',[
            'name'=>$model
        ]);
    }
    
}
