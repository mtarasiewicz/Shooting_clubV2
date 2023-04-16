<?php

namespace App\Http\Livewire\Tournaments\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;


class SoftDeleteTournamentAction extends Action
{
    public $title = '';
    public $icon = 'trash';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('translation.actions.destroy');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title'=>__('tournaments.dialogs.soft_delete.title'),
            'description'=>__('tournaments.dialogs.soft_delete.description',[
                'name'=>$model->name
            ]),
            'icon'=>'question',
            'iconColor'=>'text-red-500',
            'accept'=> [
                'label'=>__('transltaion.yes'),
                'method'=>'softDelete',
                'params'=>$model->id,
            ],
            'reject'=>[
                'label'=>__('translation.no'),
            ]
        ]);
    }
    public function renderIf($model, View $view)
    {
        return $model->deleted_at === null;
    }
}
