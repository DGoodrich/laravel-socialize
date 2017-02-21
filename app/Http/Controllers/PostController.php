<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Contracts\PostInterface;
use App\Models\Services\RelationsService;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use App\Http\Requests;

class PostController extends Controller
{
    /**
     * The post repository instance.
     *
     * @var PostInterface
     */
    protected $user;
    protected $posts;

    /**
     * Create a new controller instance.
     *
     * @param RelationsService $user
     * @param  PostInterface $post
     */
    public function __construct(RelationsService $user, PostInterface $post)
    {
        $this->middleware('auth');

        $this->user = $user;
        $this->posts = $post;
    }

    /**
     * Gets the paginated page for ajax request
     *
     * @param Request $request
     * @param $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function data(Request $request, $user)
    {
        $user = $this->user->get($user);

        $currentPage = $request->page;

        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });

        return view('post.single', ['user' => $user, 'posts' => $this->posts->getPosts($user)])->render();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request, $user)
    {
        if ($request->has('user')) {
            $user =  $request->user;
        }

        $user = $this->user->get($user);

        $this->posts->setPost($user, $request);

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $user
     * @param $postId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $user, $postId)
    {
        $user = $this->user->get($user);

        $this->posts->setComment($user, $request->comment, $postId, $request->parent);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param $user
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $user, $id)
    {
        $user = $this->user->get($user);

        if($request->type == 'post')
        {
            $this->posts->removePost($user, $id);
        }
        else
        {
            $this->posts->removeComment($user, $id);
        }

        return view('post.single', ['user' => $user, 'posts' => $this->posts->getPosts($user)])->render();
    }
}
