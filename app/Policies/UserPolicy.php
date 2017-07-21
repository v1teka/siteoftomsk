<?php

namespace App\Policies;

use App\User;
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

    }

    // Просмотр информации о пользователе
    public function view(User $current_user, User $user)
    {
        // доступно только модератору
        return $current_user->isModerator();
    }
}
