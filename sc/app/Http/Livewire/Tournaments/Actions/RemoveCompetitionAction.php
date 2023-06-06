<?php

namespace App\Http\Livewire\Tournaments\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use Illuminate\Support\Facades\DB;

class RemoveCompetitionAction extends Action
{
    public $title = '';

    public function __construct(String $title = null)
    {

        parent::__construct();
        if($title !== null)
        {
            $this->title = $title;
        } else {
            $this->title = __('translation.actions.destroy');
        }
        
    }

    public $icon = 'trash-2';

    public function handle($model, View $view)
    {
        DB::delete("DELETE from competition_tournament where tournament_id = '" . 
        $model->tournament->id . "' and competition_id = '" . $model->competition->id . "' ");
        return view('tournaments.competitions', [
            'tournament' => $model->tournament
        ]);
    }
}
