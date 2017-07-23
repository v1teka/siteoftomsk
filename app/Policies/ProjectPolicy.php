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
        // разрешено только автору, и только проекты в статусе рассматривается (null) и отклонён (0).
        // Исключение для модераторов.
        return  (($user->id == $project->user_id) && ($project->moderated == false)) || $user->isModerator();
    }

    // Администрирование проектов
    public function administrate(User $user)
    {
        // разрешено модератору
        return $user->isModerator();
    }
}
