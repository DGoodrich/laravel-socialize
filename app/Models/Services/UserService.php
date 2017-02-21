<?php

namespace App\Models\Services;

use App\Models\Contracts\UserInterface;
use App\Models\Contracts\UserRelationsInterface;
use App\Models\Contracts\PostInterface;

class UserService
{
    protected $user;
    protected $userRelation;
    protected $post;

    /**
     * Loads our $userRepo with the actual Repo associated with our UserInterface
     *
     * @param UserInterface $user
     * @param UserRelationsInterface $userRelation
     * @param PostInterface $post
     */
    public function __construct(UserInterface $user, UserRelationsInterface $userRelation, PostInterface $post)
    {
        $this->user = $user;
        $this->userRelation = $userRelation;
        $this->post = $post;
    }

    /**
     * Gets the user profile with all relevant data
     *
     * @param $user
     * @return array|bool
     */
    public function userProfile($user)
    {
        $user = $this->get($user);

        if(is_object($user))
        {
            return [
                'user' => $user,
                'followingCount' => $this->userRelation->getCount('following', $user, TRUE),
                'followersCount' => $this->userRelation->getCount('followers', $user, TRUE),
                'postsCount' => $this->post->getPosts($user)->count(),
                'is_following' => $this->userRelation->isFollowing($user),
                'posts' => $this->post->getPosts($user)
            ];
        }

        return false;
    }

    /**
     * Method to get user based either on name or ID
     *
     * @param $user
     * @return string
     */
    public function get($user)
    {
        if (is_numeric($user))
        {
            $user = $this->user->getById($user);
        }
        else
        {
            $user = $this->user->getByUsername($user);
        }

        if ($user != null)
        {
            return $user;
        }

        return false;
    }

    /**
     * Method to get a list of users based on search criteria
     *
     * @param $data
     * @param null $attributes
     * @return string
     */
    public function index($data, $attributes = null)
    {

        if(!isset($attributes))
        {
            if ($data != 'all') {
                $users = $this->user->search($data);
            } else {
                $users = $this->user->getAllWhere(['is_banned' => FALSE]);
            }
        }
        else
        {
            $users = $this->user->findWhere($attributes);
        }

        if ($users != null)
        {
            return ['users' => $users];
        }

        return 'No Users Found';

    }

    /**
     * Create a new user.
     *
     * @param $attributes
     * @return mixed
     */
    public function create($attributes)
    {
        flash()->success("Welcome.");

        return $this->user->create($attributes);
    }

    public function uploadPhoto($id, $photo, array $dimensions)
    {
        $this->user->uploadProfilePhoto($id, $photo, $dimensions);
    }

    /**
     * Update user profile.
     *
     * @param $id
     * @param $attributes
     * @return mixed
     */
    public function update($id, $attributes)
    {
        $user = $this->get($id);

        if(isset($attributes['role']) && $user->hasRole('Superuser'))
        {
            $user->syncRoles($attributes['role']);
        }

        if(!empty($attributes['password']))
        {
            $attributes['password'] = bcrypt($attributes['password']);
        } else
        {
            unset($attributes['password']);
        }

        flash()->success("Your details have been updated.");

        return $this->user->update($id, $attributes);
    }

    /**
     * Destroy user profile.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        flash()->success("Your account has been deleted.");

        return $this->user->destroy($id);
    }

}