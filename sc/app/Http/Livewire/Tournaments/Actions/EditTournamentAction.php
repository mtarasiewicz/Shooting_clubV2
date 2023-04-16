<?php

namespace App\Http\Livewire\Tournaments\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\RedirectAction;

class EditTournamentAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'edit')
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('update', $model);
    }
}
