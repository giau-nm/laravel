<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConfigPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function before($user, $ability)
    {
        
    }

    public function configAdmin(User $user)
    {
        if ($user->isAdmin()) {
            return true;
        }
    }
}
