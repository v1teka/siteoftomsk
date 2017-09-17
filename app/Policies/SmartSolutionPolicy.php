<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SmartSolutionPolicy
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

    // Создание Smart решения
    public function create(User $user)
    {
        // доступно только администратору и модератору
        return $user->isAdmin() || $user->isModerator();
    }

    // Обновление Smart решения
    public function update(User $user, SmartSolution $solution)
    {
        // доступно только администратору и модератору
        return $user->isAdmin() || $user->isModerator();
    }

    // Удаление Smart решения
    public function delete(User $user, SmartSolution $solution)
    {
        // доступно только администратору и модератору
        return $user->isAdmin() || $user->isModerator();
    }

    // Администрирование Smart решения
    public function administrate(User $user)
    {
        // доступно только администратору и модератору
        return $user->isAdmin() || $user->isModerator();
    }
}
