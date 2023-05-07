<?php

namespace App\Http\Livewire\Users\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Actions\Confirmable;
use LaravelViews\Views\View;

class VerifyUserAction extends Action
{
    public $title ='';
    public $icon = "check";

    public function __construct()
    {
        parent::__construct();
        $this->title = __('users.action.verify_user');
    }
    public function handle($model, View $view)
    {
        $model->verified = true;
        $model->save();
        $this->success(__('users.messages.successes.verify'));
    }
    public function renderIf($item, View $view)
    {
        return $item->verified == null && !$item->verified;
    }
}
