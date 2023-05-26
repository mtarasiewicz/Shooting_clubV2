<?php

namespace App\Policies;

use App\Models\Competition;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CompetitionPolicy
{
    use AuthorizesRequests;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('competitions.index');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Competition $competition)
    {
        return $user->can('competitions.index');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('competitions.manage');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Tournament  $tournament
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Competition $competition)
    {
        return $competition->deleted_at === null
            && $user->can('competitions.manage');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Competition $competition)
    {
        return $competition->deleted_at === null
            && $user->can('competitions.manage');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Competition  $competition
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Competition $competition)
    {
        return $competition->deleted_at !== null
            && $user->can('competitions.manage');
    }

}
