<?php

namespace App\Policies;

use App\Models\Contracts\UserRelationsInterface;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Entities\User;
use Auth;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * The post repository instance.
     *
     * @var UserRelationsInterface
     */
    protected $relations;

    /**
     * Create a new policy instance.
     *
     * @param UserRelationsInterface $relations
     */
    public function __construct(UserRelationsInterface $relations)
    {
        $this->relations = $relations;
    }

    /**
     * Determine if the given user can create a new profile.
     *
     * @param User $user
     * @return bool
     */
    public function create(User $user, $post, $profile)
    {
        if($this->relations->isAccepted($profile))
        {
            return true;
        }

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
