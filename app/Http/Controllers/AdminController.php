<?php

namespace App\Http\Controllers;

use App\Models\Contracts\UserInterface as UserInterface;
use App\Models\Contracts\PostInterface as PostInterface;
use App\Models\Services\AdminService;
use App\Models\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    protected $admin;
    protected $user;
    protected $posts;

    public function __construct(AdminService $admin, UserInterface $user, PostInterface $posts)
    {
        $this->middleware('admin');

        $this->admin = $admin;
        $this->user = $user;
        $this->posts = $posts;
    }

    /**
     * Show the admin panel.
     *
     * @return Response
     */
    public function admin()
    {
        return view('admin.dashboard', $this->admin->getIndexData());
    }

    /**
     * Displays a list of all admin users
     *
     * @return Response
     */
    public function showAdminUsers()
    {
        $users = User::role(['Admin', 'Superuser'])->where('is_banned', FALSE)->get();

        return view('admin.admin-users', compact('users'));
    }

    /**
     * Show a list of users with specific conditions
     *
     * @return Response
     */
    public function showUsers($page)
    {
        $isBanned = FALSE;
        $route = 'admin.banUsers';

        if($page == 'banned-users')
        {
            $isBanned = TRUE;
            $route = 'admin.unBanUsers';
        }

        $users = $this->user->findWhere(['is_banned' => $isBanned]);

        return view('admin.ban-users', compact('users', 'page', 'route'));
    }

    /**
     * ban a list of users.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function banUsers(Request $request)
    {
        $this->user->setBanUsers($request->user, TRUE);

        return redirect()->back();
    }

    /**
     * Set is_banned to false for a list of banned users.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function unBanUsers(Request $request)
    {
        $this->user->setBanUsers($request->user, FALSE);

        return redirect()->back();
    }
}
