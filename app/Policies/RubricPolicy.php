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
        // доступно только модератору
        return $user->isModerator();
    }

    // Обновление рубрики
    public function update(User $user, Rubric $rubric)
    {
        // доступно только модератору
        return $user->isModerator();
    }
}
