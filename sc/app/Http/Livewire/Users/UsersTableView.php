<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use LaravelViews\Facades\Header;
use LaravelViews\Views\TableView;
use App\Http\Livewire\Users\Actions\AssignAdminRoleAction;
use App\Http\Livewire\Users\Actions\AssignJudgeRoleAction;
use App\Http\Livewire\Users\Actions\RemoveAdminRoleAction;
use App\Http\Livewire\Users\Actions\RemoveJudgeRoleAction;

class UsersTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = User::class;
    public $searchBy = [
        'name',
        'email',
        'roles.name',
        'created_at'
    ];

    protected $paginate = 5;

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title(__('users.attributes.name')),
            Header::title(__('users.attributes.email')),
            __('users.attributes.role'),
            Header::title(__('users.attributes.created_at'))
        ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->name,
            $model->email,
            $model->roles->implode('name', ', '),
            $model->created_at,
        ];
    }
    protected function actionsByRow()
    {
        return [
            new AssignAdminRoleAction,
            new AssignJudgeRoleAction,
            new RemoveAdminRoleAction,
            new RemoveJudgeRoleAction,
        ];
    }
}
