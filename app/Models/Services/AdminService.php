<?php

namespace App\Models\Services;

use App\Models\Contracts\UserInterface;
use App\Models\Contracts\PostInterface;
use App\Models\Contracts\UserRelationsInterface;
use Carbon\Carbon;

class AdminService
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
     * Gets all relevant data for admin index
     *
     * @return array
     */
    public function getIndexData()
    {
        $users = $this->user->getAll();

        $usersTotals = $this->user->getTotal();

        $postTotals = $this->post->getTotal();

        $followingRequestsTotals = $this->getFollowingRequestTotals();

        $bannedTotals = $this->getBannedUserTotals();

        return compact('users', 'usersTotals', 'postTotals', 'followingRequestsTotals', 'bannedTotals');

    }

    /**
     * Gets all Following requests that have been accepted and between two dates
     *
     * @return array
     */
    private function getFollowingRequestTotals()
    {
        //Get current month following requests
        $currentMonthTotal = $this->userRelation->getRelations(['accepted' => TRUE], [
            Carbon::now()->startOfMonth(),
            Carbon::now()
        ])->count();

        //Get last months following requests
        $lastMonthTotal = $this->userRelation->getRelations(['accepted' => TRUE], [
            new Carbon('first day of last month'),
            Carbon::now()->startOfMonth()
        ])->count();

        return compact('currentMonthTotal', 'lastMonthTotal');
    }

    /**
     * Gets all banned users between two dates
     *
     * @return array
     */
    private function getBannedUserTotals()
    {
        //Get current month following requests
        $currentMonthTotal = $this->user->findWhere(['is_banned' => TRUE, [
            'updated_at' ,'>=', Carbon::now()->startOfMonth()]
        ])->count();

        //Get last months following requests
        $lastMonthTotal = $this->user->findWhere(['is_banned' => TRUE, [
            'updated_at' ,'>=', new Carbon('first day of last month')]
        ])->count();

        return compact('currentMonthTotal', 'lastMonthTotal');
    }
}