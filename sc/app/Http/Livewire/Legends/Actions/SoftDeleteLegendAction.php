<?php

namespace App\Http\Livewire\Legends\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;

class SoftDeleteLegendAction extends Action
{

    public $title = '';
    public $icon = 'trash-2';

    public function __construct()
    {
        parent::__construct();
        $this->title = __('translation.actions.destroy');
    }

    public function handle($model, View $view)
    {
        $view->dialog()->confirm([
            'title' => __('legends.dialogs.soft_delete_title'),
            'description' => __('legends.dialogs.soft_delete_description',[
                'name' => $model->name
            ]),
            'icon' => 'question',
            'iconColor' => 'text-red-500',
            'accept' => [
                'label' => __('translation.yes'),
                'method' => 'softDelete',
                'params' => $model->id,
            ],
            'reject' => [
                'label' => __('translation.no'),
            ]

        ]);

    }

    public function renderIf($model, View $view)
        {
            return $model->deleted_at === null;
        }

}
