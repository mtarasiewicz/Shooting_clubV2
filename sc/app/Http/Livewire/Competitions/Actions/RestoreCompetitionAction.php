<?php

namespace App\Http\Livewire\Competitions\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;

class RestoreCompetitionAction extends Action
{
    public $title = '';
    public $icon='trash';

    public function __construct()
    {
        parent::__construct();
        $this->title=__('translation.actions.restore');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title'=>__('competitions.dialogs.restore_title'),
            'description'=>__('competitions.dialogs.restore_description',[
                'name'=>$model->name
            ]),
            'icon'=>'question',
            'iconColor'=>'text-green-500',
            'accept'=>[
                'label'=>__('translation.yes'),
                'method'=>'restore',
                'params'=>$model->id,
            ],
            'reject'=>[
                'label'=>__('translation.no'),
            ]
        ]);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('restore',$model);
    }
}
