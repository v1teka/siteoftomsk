<?php

namespace App\Policies;

use App\User;
use App\ForumMessage;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumMessagePolicy
{
    use HandlesAuthorization;

    public function send(User $user)
    {
        // Для всех авторизированных пользователей
        return true;
    }

    public function delete(User $user, ForumMessage $message)
    {
        // Разрешено только автору.
        // Исключение для модераторов.
        return  ($user->id == $message->user_id) || $user->isModerator();
    }
}
