<?php

namespace App\Http\Livewire\LegendItems\Actions;

use Illuminate\Database\Eloquent\Model;
use App\Http\Livewire\Actions\RestoreAction;

class RestoreLegendAction extends RestoreAction
{
    protected function dialogTitle(): String
            {
                return __('legends.dialog.restore.title');
            }
        
            protected function dialogDescription(Model $model): String
            {
                return __('legends.dialog.restore.desc',[
                    'name' => $model
                ]);
            }
}
