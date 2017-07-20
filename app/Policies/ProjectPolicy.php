<?php

namespace App\Policies;

use App\User;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    // Обновление проекта
    public function update(User $user, Project $project)
    {
        // Редактирование разрешено только автору, до одобрения проекта модератором
        return  $user->id === $project->user_id;
    }

    // Модерация проекта
    public function moderate(User $user, Project $project)
    {
        return $user->isModerator();
    }

    // Публикация проекта
    public function publish(User $user, Project $project)
    {
        return $user->isModerator();
    }

    // Администрирование проектов
    public function administrate(User $user)
    {
        return $user->isModerator();
    }
}
