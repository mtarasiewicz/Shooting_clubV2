<?php

namespace App\Http\Livewire\Tournaments\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use LaravelViews\Actions\RedirectAction;

class DownloadRulesAction extends RedirectAction
{
    public function __construct(string $to, string $title, string $icon = 'download')
    {
        parent::__construct($to, $title, $icon);
    }
    public function renderIf($item, View $view)
    {
        return $item->rules;
    }
}

