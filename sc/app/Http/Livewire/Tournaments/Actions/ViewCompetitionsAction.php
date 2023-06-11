<?php

namespace App\Http\Livewire\Tournaments\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\RedirectAction;

class ViewCompetitionsAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'target')
    {
        parent::__construct($to, $title, $icon);
    }

    // TODO authorization
    // public function renderIf($model, View $view)
    // {
    //     return request()->user()->can('viewAny', $model);
    // }
}
