<?php

namespace App\Http\Livewire\Tournaments\Actions;


use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\RestoreAction;

class RestoreTournamentAction extends RestoreAction
{
    protected function dialogTitle():String
    {
        {
            return __('tournaments.dialogs.restore_title');
        }
    }

    protected function dialogDescription(Model $model): String
    {
        return __('tournaments.dialogs.restore_description',[
            'name' => $model
        ]);
    }
}
