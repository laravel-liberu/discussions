<?php

namespace LaravelLiberu\Discussions\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use LaravelLiberu\Discussions\Models\Discussion as Model;
use LaravelLiberu\Users\Models\User;

class Discussion
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->isAdmin() || $user->isSupervisor()) {
            return true;
        }
    }

    public function handle(User $user, Model $discussion)
    {
        return $user->id === (int) $discussion->created_by;
    }
}
