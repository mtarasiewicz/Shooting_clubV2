<?php

namespace App\Http\Livewire\Legenditems\Actions;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\SoftDeleteAction;


class SoftDeleteLegendAction extends SoftDeleteAction
{
    protected function dialogTitle(): String
    {
        return __('legends.dialog.soft_delete.title');
    }

    protected function dialogDescription(Model $model): String
    {
        return __('legends.dialog.soft_delete.desc',[
            'name' => $model
        ]);
    }
}