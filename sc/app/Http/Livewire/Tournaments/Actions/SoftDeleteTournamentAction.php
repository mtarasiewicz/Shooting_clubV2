<?php

namespace App\Http\Livewire\Tournaments\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\SoftDeleteAction;

class SoftDeleteTournamentAction extends SoftDeleteAction
{
    protected function dialogTitle(): String
    {
        return __('tournaments.dialogs.soft_delete_title');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('tournaments.dialogs.soft_delete_description',[
            'name'=>$model
        ]);
    }
}
