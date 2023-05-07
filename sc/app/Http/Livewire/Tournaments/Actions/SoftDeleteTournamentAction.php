<?php

namespace App\Http\Livewire\Tournaments\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\SoftDeleteAction;

class SoftDeleteTournamentAction extends SoftDeleteAction
{
    // public $title = '';
    // public $icon = 'trash';

    // public function __construct()
    // {
    //     parent::__construct();
    //     $this->title = __('translation.actions.destroy');
    // }

    // public function handle($model, View $view)
    // {
    //     $view->dialog()->confirm([
    //         'title'=>__('tournaments.dialogs.soft_delete.title'),
    //         'description'=>__('tournaments.dialogs.soft_delete.description',[
    //             'name'=>$model->name
    //         ]),
    //         'icon'=>'question',
    //         'iconColor'=>'text-red-500',
    //         'accept'=> [
    //             'label'=>__('transltaion.yes'),
    //             'method'=>'softDelete',
    //             'params'=>$model->id,
    //         ],
    //         'reject'=>[
    //             'label'=>__('translation.no'),
    //         ]
    //     ]);
    // }
    // public function renderIf($model, View $view)
    // {
    //     return $model->deleted_at === null;
    // }
    protected function dialogTitle(): String
    {
        return __('tournaments.dialogs.soft_delete.title');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('tournaments.dialogs.soft_delete.description',[
            'name'=>$model
        ]);
    }
}
