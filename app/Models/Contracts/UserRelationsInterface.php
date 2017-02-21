<?php 

namespace App\Models\Contracts;


interface UserRelationsInterface extends BaseInterface
{
    /**
     * Interface for creating a new follower request
     *
     * @param $user
     * @param $followingUser
     * @return mixed
     */
    public function setNewFollower($user, $followingUser);

    /**
     * Interface for accepting a followers request
     *
     * @param $followingUser
     * @return mixed
     */
    public function setAccept($followingUser);

    /**
     * Interface for removing follower requests
     *
     * @param $user
     * @return mixed
     */
    public function setUnfollow($user);

    /**
     * Interface for retrieving search results
     *
     * @param $data
     * @return mixed
     */
    public function search($data);

    /**
     * Interface for checking if the user is been followed
     *
     * @param $user
     * @return mixed
     */
    public function isFollowing($user);

    /**
     * Interface for checking if user request has been accepted
     *
     * @param $user
     * @return mixed
     */
    public function isAccepted($user);

    /**
     * Interface for the count of users based on criteria
     *
     * @param $type
     * @param $user
     * @param $accepted
     * @return mixed
     */
    public function getCount($type, $user, $accepted);

    /**
     * Interface to find resource by username
     *
     * @param $user
     * @return mixed
     */
    public function getUsers($type, $user, $accepted);

    /**
     * Interface for getting all relations based on conditions
     *
     * @param array $where
     * @param array $betweenDates
     * @return mixed
     */
    public function getRelations(array $where, array $betweenDates);
}