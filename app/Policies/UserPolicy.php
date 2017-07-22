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

    // Управление ролями пользователя
    public function update_roles(User $current_user, User $user)
    {
        // доступно только модератору для управления ролями других пользователей
        return $current_user->isModerator() && $current_user != $user;
    }

    // Администрирование пользователей
    public function administrate(User $current_user)
    {
        // доступно только модератору
        return $current_user->isModerator();
    }
}
