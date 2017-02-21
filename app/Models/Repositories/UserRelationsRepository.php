<?php 

namespace App\Models\Repositories; 

use App\Models\Contracts\UserRelationsInterface as UserRelationsInterface;

use App\Models\Entities\User;
use Illuminate\Support\Facades\DB;
use Auth;

class UserRelationsRepository extends BaseRepository implements UserRelationsInterface
{
    protected $loggedInUser;

    /**
     * UserRelationsRepository constructor.
     * @param User $user
     */
    function __construct(User $user)
    {
        $this->loggedInUser = Auth::user();
        $this->model = $user;
    }

    /**
     * Creates a new follower request.
     *
     * @param $user
     * @param $followingUser
     * @return bool
     */
    public function setNewFollower($user, $followingUser)
    {
        $user->following()->attach($followingUser);

        return true;
    }

    /**
     * Sets the user follower request to true.
     *
     * @param $followingUser
     * @return bool
     */
    public function setAccept($followingUser)
    {
        $this->loggedInUser->followers()->sync([$followingUser->id => [ 'accepted' => TRUE] ], FALSE);

        return true;
    }

    /**
     * Detaches all user relations.
     *
     * @param $followingUser
     * @return bool
     */
    public function setUnfollow($followingUser)
    {
        $this->loggedInUser->following()->detach($followingUser);

        $followingUser->following()->detach($this->loggedInUser);

        return true;
    }

    /**
     * Search query for users.
     *
     * @param $data
     * @return mixed
     */
    public function search($data)
    {
        return $this->model->where([['name', 'like', '%'. $data .'%'], ['is_banned', FALSE]])->paginate(6);
    }

    /**
     * Checks whether the user is been followed.
     *
     * @param $user
     * @return bool
     */
    public function isFollowing($user)
    {
        $user = $this->loggedInUser->following()->where([['user_id', $user->id], ['is_banned', FALSE]])->get();

        if($user->count())
        {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * Checks whether the user request has been accepted.
     *
     * @param $user
     * @return bool
     */
    public function isAccepted($user)
    {
        $user = $this->loggedInUser->following()->where([
            ['user_id', '=', $user->id] ,
            ['accepted', '=', 1]
        ])->first();

        if($user)
        {
            return TRUE;
        }

        return FALSE;
    }

    /**
     * Gets the relations type for the user.
     *
     * @param $type
     * @param $user
     * @return mixed
     */
    protected function getRelationType($type, $user)
    {
        if($type == 'following')
        {
            return $user->following()->where('is_banned', FALSE);
        }

        return $user->followers()->where('is_banned', FALSE);
    }

    /**
     * Gets the total of users for set criteria.
     *
     * @param $type
     * @param $user
     * @param $accepted
     * @return mixed
     */
    public function getCount($type, $user, $accepted)
    {
        $user = $this->getRelationType($type, $user);

        return $user->wherePivot('accepted', $accepted)->count();
    }

    /**
     * Gets a collection of users based on criteria.
     *
     * @param $type
     * @param $user
     * @param $accepted
     * @return mixed
     */
    public function getUsers($type, $user, $accepted)
    {
        $user = $this->getRelationType($type, $user);

        return $user
            ->wherePivot('accepted', $accepted)
            ->orderBy('created_at', 'asc')
            ->paginate(6);
    }

    /**
     * Gets all relations from the bridging table
     *
     * @param array $where
     * @param array $betweenDates
     * @return mixed
     */
    public function getRelations(array $where, array $betweenDates)
    {
        return DB::table('followers')
            ->select('*')
            ->where($where)
            ->whereBetween('created_at', $betweenDates);
    }
}