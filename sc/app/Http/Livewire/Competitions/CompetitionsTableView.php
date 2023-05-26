<?php

namespace App\Http\Livewire\Competitions;

use WireUi\Traits\Actions;
use App\Models\Competition;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Traits\Restore;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Competitions\Actions\EditCompetitionAction;
use App\Http\Livewire\Competitions\Actions\RestoreCompetitionAction;
use App\Http\Livewire\Competitions\Actions\SoftDeleteCompetitionAction;

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

    public function repository(): Builder
    {
        $query = Competition::query();
        if(request()->user()->can('create', Competition::class))
        {
            $query->withTrashed();
        }
        return $query;
    }

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

    protected function actionsByRow()
    {
        return [
            new EditCompetitionAction('competitions.edit', __('Edytuj')),
            new SoftDeleteCompetitionAction(),
            new RestoreCompetitionAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $competition = Competition::find($id);
        $competition->delete();
        $this->notification()->success(
            $title = __('competitions.dialogs.successes.destroy_title'),
            $description =  __('competitions.dialogs.successes.destroy_description'),
        );
    }

    public function restore(int $id)
    {
        $competition = Competition::withTrashed()->find($id);
        $competition->restore();
        $this->notification()->success(
            $title = __('competitions.dialogs.successes.restore_title'),
            $descriptions = __('competitions.dialogs.successes.restore_description', [
                'name' => $competition->name,
            ])
            );
    }
}
