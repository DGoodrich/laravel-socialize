<?php

namespace App\Http\Controllers;

use App\Http\Requests\FollowerRequest;
use Illuminate\Http\Request;
use App\Models\Services\RelationsService;
use Illuminate\Pagination\Paginator;

class UserRelationsController extends Controller
{
    protected $user;

    /**
     * UserController constructor.
     *
     * @param RelationsService $user
     */
    public function __construct(RelationsService $user)
    {
        $this->middleware('auth');

        $this->user = $user;
    }

    /**
     * Gets all pending user following requests
     *
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($user)
    {
        return view('requests.user_requests', $this->user->getUserRelations('followers', $user, FALSE, 'all'));
    }

    /**
     * Display a listing of searched for user group,
     * Also sets the paginated page for ajax request
     *
     * @param Request $request
     * @param $user
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function data(Request $request, $user, $data)
    {
        $currentPage = $request->page;

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

         return view('users.partials.following', $this->user->getUserRelations($request->type, $user, TRUE, $data))->render();
    }

    /**
     * Create a new following request
     *
     * @param Request $request
     * @param $username
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request, $username)
    {
        $this->user->NewFollower($request->user(), $username);

        return redirect('/user/'. $username);
    }

    /**
     * Accepts the followers request
     *
     * @param $user
     * @param $followerId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($user, $followerId)
    {
        $this->user->acceptRequest($followerId);

        return redirect()->back();
    }

    /**
     * Removes the relationship between users
     *
     * @param $user
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($user, $id)
    {
        $this->user->unfollow($id);

        return redirect()->back();
    }
}
