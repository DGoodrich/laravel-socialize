<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Services\UserService;

class UserController extends Controller
{
    protected $user;

    /**
     * UserController constructor.
     *
     * @param UserService $user
     */
    public function __construct(UserService $user)
    {
        $this->middleware('auth');

        $this->middleware('admin')->only('edit');

        $this->user = $user;
    }

    /**
     * Display a listing of all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index', $this->user->index('all'));
    }

    /**
     * Display a listing of searched for user group
     *
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function data($data)
    {
        return view('users.partials.users', $this->user->index($data));
    }

    /**
     * Display a listing of a specific user.
     *
     * @param $user
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        return view('users.show', $this->user->userProfile($user));
    }

    /**
     * Create a new user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a new user
     *
     * @param UserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(UserRequest $request)
    {
        $user = $this->user->create($request->toArray());

        return redirect('/user/'. $user->username);
    }

    /**
     * Edit a specific user.
     *
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($user)
    {
        $user = $this->user->get($user);

        return view('users.edit', ['user' => $user]);

    }

    /**
     * Update a specific user.
     *
     * @param UserRequest $request
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(UserRequest $request, $user)
    {
        $user = $this->user->get($user);

        $this->user->update($user->id, $request->toArray());

        if ($request->hasFile('picture')) {
            $this->user->uploadPhoto($user->id, $request->picture, [
                'size' => (int)$request->crop_values['size'],
                'x'    => (int)$request->crop_values['x_offset'],
                'y'    => (int)$request->crop_values['y_offset'],
            ]);
        }


        return redirect('/user/'. $user->username);
    }

    /**
     * Remove a user
     *
     * @param UserRequest $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRequest $request, $id)
    {
        $this->user->destroy($id);

        return redirect()->Back();
    }
}