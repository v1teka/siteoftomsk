<?php

namespace App\Policies;

use App\User;
use App\Rubric;
use Illuminate\Auth\Access\HandlesAuthorization;

class RubricPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {

    }

    // Создание рубрики
    public function create(User $user)
    {
        // доступно только администратору
        return $user->isAdmin();
    }

    // Обновление рубрики
    public function update(User $user, Rubric $rubric)
    {
        // доступно только администратору
        return $user->isAdmin();
    }

    // Удаление рубрики
    public function delete(User $user, Rubric $rubric)
    {
        // доступно только администратору
        return $user->isAdmin();
    }

    // Администрирование рубрик
    public function administrate(User $user)
    {
        // доступно только администратору
        return $user->isAdmin();
    }
}
