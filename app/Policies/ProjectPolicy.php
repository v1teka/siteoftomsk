<?php

namespace App\Policies;

use App\User;
use App\Project;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProjectPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        // Для всех авторизированных пользователей
        // return true;
        return $user->isModerator();
    }

    // Обновление проекта
    public function update(User $user, Project $project)
    {
        // разрешено только автору, и только проекты в статусе рассматривается (null) и отклонён (0).
        // Исключение для модераторов и администраторов.
        return  (($user->id == $project->user_id) && ($project->moderated == false)) || $user->isModerator() || $user->isAdmin();
    }

    // Администрирование проектов
    public function administrate(User $user)
    {
        // доступно только модератору и администратору
        return (($user->isModerator()) || ($user->isAdmin()));
    }
}
