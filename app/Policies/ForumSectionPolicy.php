<?php

namespace App\Policies;

use App\User;
use App\ForumSection;
use App\ForumTopic;
use Illuminate\Auth\Access\HandlesAuthorization;

class ForumSectionPolicy
{
    use HandlesAuthorization;

    public function moderate(User $user)
    {
        // Для модераторов
        return $user->isModerator();
    }
}
