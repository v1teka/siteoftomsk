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

    // Изменение информации о пользователе
    public function update(User $current_user, User $user)
    {
        // доступно только модератору и только для управления ролями других пользователей
        return $current_user->isModerator() && $current_user != $user;
    }

    // Администрирование пользователей
    public function administrate(User $current_user)
    {
        // доступно только модератору
        return $current_user->isModerator();
    }
}
