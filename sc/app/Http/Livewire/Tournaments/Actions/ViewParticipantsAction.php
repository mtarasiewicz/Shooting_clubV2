<?php

namespace App\Http\Livewire\Tournaments\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\RedirectAction;

class ViewParticipantsAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'users')
    {
        parent::__construct($to, $title, $icon);
    }

    public function renderIf($model, View $view)
    {
        return request()->user()->can('viewAny', $model);
    }
}
