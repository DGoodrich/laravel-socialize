<?php

namespace App\Models\Services;

class RelationsService extends UserService
{

    /**
     * This method is used for retrieving a list of users based on certain criteria.
     * This is used to get a list of all Following / Followers / Search users results
     *
     * @param $type
     * @param $user
     * @param $accepted
     * @param $search
     * @return array|bool
     */
    public function getUserRelations($type, $user, $accepted, $search)
    {
        $user = $this->get($user);

        if(is_object($user))
        {
            if ($search != 'all')
            {
                $results = $this->userRelation->search($search);
            }
            else
            {
                $results = $this->userRelation->getUsers($type, $user, $accepted);
            }

            return [
                'user' => $user,
                'results' => $results
            ];
        }

        return false;
    }

    /**
     * Sets a new follower request for a users and sets a flash message
     *
     * @param $user
     * @param $username
     */
    public function NewFollower($user, $username)
    {
        $followingUser = $this->get($username);

        $this->userRelation->setNewFollower($user, $followingUser);

        flash()->info("A following request has been sent to this user.");
    }

    /**
     * Accepts a user follower request and sets a flash message
     *
     * @param $followerId
     */
    public function acceptRequest($followerId)
    {
        $followingUser = $this->get(decrypt($followerId));

        $this->userRelation->setAccept($followingUser);

        flash()->warning("You have a new follower.");
    }

    /**
     * Removes all relations between users and sets a flash message
     *
     * @param $id
     */
    public function unfollow($id)
    {
        $user = $this->get(decrypt($id));

        $this->userRelation->setUnfollow($user);

        flash()->warning("User removed from your list.");

    }

}