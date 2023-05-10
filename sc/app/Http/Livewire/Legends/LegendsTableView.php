<?php

namespace App\Http\Livewire\Legends;

use App\Models\Legend;
use WireUi\Traits\Actions;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Traits\Restore;
use App\Http\Livewire\Traits\SoftDelete;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Livewire\Legends\Actions\EditLegendAction;
use App\Http\Livewire\Legends\Actions\RestoreLegendAction;
use App\Http\Livewire\Legends\Actions\SoftDeleteLegendAction;

class LegendsTableView extends TableView
{
    use Actions;
    use SoftDelete;
    use Restore;
    /**
     * Sets a model class to get the initial data
     */
    protected $model = Legend::class;

    public $searchBy = [
        'shortcut',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function repository(): Builder
    {
        return Legend::query()->withTrashed();
    }

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('legends.attributes.shortcut'))->sortBy('shortcut'),
            Header::title(__('legends.attributes.name'))->sortBy('name'),
            Header::title(__('legends.attributes.created_at'))->sortBy('created_at'),
            Header::title(__('legends.attributes.updated_at'))->sortBy('updated_at'),
            Header::title(__('legends.attributes.deleted_at'))->sortBy('deleted_at'),
            
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
            $model->created_at,
            $model->updated_at,
            $model->deleted_at,
        ];
    }

    protected function actionsByRow()
    {
        return [
            new EditLegendAction('legends.edit', __('Edytuj')),
            new SoftDeleteLegendAction(),
            new RestoreLegendAction(),
        ];
    }

    public function softDelete(int $id)
    {
        $legend = Legend::find($id);
        $legend->delete();
        $this->notification()->success(
            $title = __('legends.dialogs.successes.destroy_title'),
            $description =  __('legends.dialogs.successes.destroy_description'),
        );
    }

    public function restore(int $id)
    {
        $legend = Legend::withTrashed()->find($id);
        $legend->restore();
        $this->notification()->success(
            $title = __('legends.dialogs.successes.restore_title'),
            $descriptions = __('legends.dialogs.successes.restore_description', [
                'name' => $legend->name,
            ])
            );
    }
}
