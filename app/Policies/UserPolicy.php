<?php

namespace App\Policies;

use App\Models\Entities\User;
use Auth;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the given user can create a new profile.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user)
    {
        if($user->hasRole('Superuser')) {
            return true;
        }
        return false;
    }

    /**
     * Determine if the given user can update a profile.
     *
     * @param User $user
     * @param $profile
     * @return bool
     */
    public function update(User $user, $profile)
    {
        if($user->hasRole(['Admin', 'Superuser'])) {
            return true;
        }

        return $profile->id === $user->id;
    }

    /**
     * Determine if the given user can delete a profile.
     *
     * @param  User  $user
     * @return bool
     */
    public function destroy(User $user, $profile)
    {
        if($user->hasRole(['Admin', 'Superuser'])) {
            return true;
        }

        return $profile->id === $user->id;
    }
}
