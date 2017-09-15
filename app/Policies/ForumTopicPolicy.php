<?php

namespace App\Policies;

use App\User;
use App\ForumTopic;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumTopicPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        // Для всех авторизированных пользователей
        return true;
    }

    public function update(User $user, ForumTopic $topic)
    {
        // Разрешено только создателю.
        // Исключение для модераторов.
        return  ($user->id == $topic->user_id) || $user->isModerator();
    }
}
