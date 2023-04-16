<?php

namespace App\Http\Livewire\Users\Actions;

use LaravelViews\Views\View;
use LaravelViews\Actions\Action;
use Illuminate\Support\Facades\Auth;



class AssignJudgeRoleAction extends Action
{
    public $title = '';
    public $icon = 'crosshair';
    public function __construct()
    {
        parent::__construct();
        $this->title = __('users.action.assign_judge_role');
    }

    public function handle($model, View $view)
    {
        $model->assignRole(config('auth.roles.judge'));
        $this->success(__('users.messages.successes.judge_role_assigned'));

    }

    public function renderIf($item, View $view)
    {
        return Auth::user()->isAdmin()
            && !$item->hasRole(config('auth.roles.judge'));
    }
}
