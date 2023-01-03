<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    //use HandlesAuthorization;

    public function update(User $users, User $user_model)
    {
        return $users->user_id === $user_model->id ? Response::allow() : Response::deny();
    }
}
