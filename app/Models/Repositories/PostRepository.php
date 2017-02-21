<?php

namespace App\Models\Repositories;

use App\Models\Contracts\PostInterface;
use App\Models\Entities\Post;
use App\Models\Entities\Comment;
use Auth;

class PostRepository extends BaseRepository implements PostInterface
{
    protected $loggedInUser;

    /**
     * UserRelationsRepository constructor.
     *
     * @param Post $post
     */
    function __construct(Post $post)
    {
        $this->loggedInUser = Auth::user();
        $this->model = $post;
    }

    protected function Posts()
    {
        return $this->model->with([
                'comments',
                'parentComments.owner',
                'parentComments.allRepliesWithOwner'
            ])->orderBy('created_at', 'desc');
    }

    public function getPosts($user)
    {
        return $this->Posts()->where('user_id', $user->id)->paginate(6);
    }

    public function setPost($user, $attributes)
    {
        $user->posts()->create([
            'poster_id' => $attributes->user()->id,
            'body' => $attributes->post,
        ]);
    }

    public function setComment($user, $comment, $post, $parent)
    {
        $this->model->find($post)->comments()->create([
            'user_id' => $this->loggedInUser->id,
            'parent_id' => $parent,
            'body' => $comment,
        ]);
    }

    public function removePost($user, $id)
    {
        $this->model->find($id)->delete();
    }

    public function removeComment($user, $id)
    {
        Comment::find($id)->delete();
    }

}