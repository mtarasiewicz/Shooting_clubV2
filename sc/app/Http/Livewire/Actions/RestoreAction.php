<?php

namespace App\Http\Livewire\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class RestoreAction extends Action
{

    public $title = '';
    

    public function __construct(?String $title = null)
    {
        parent::__construct();
        if ($title !== null) {
            $this->title = $title;
        } else {
            $this->title = __('translation.actions.restore');
        }
    }

    public $icon='trash';

    protected function dialogTitle(): String
    {
        return __('translation.dialogs.restore.title');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('ranslation.dialogs.restore.desc', ['model' => $model]);
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => $this->dialogTitle(),
            'description' => $this->dialogDescription($model),
            'icon' => 'question',
            'iconColor' => 'text-green-500',
            'accept' => [
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
