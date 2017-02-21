<?php 

namespace App\Models\Contracts;

interface PostInterface extends BaseInterface
{
    public function getPosts($user);

    public function setPost($user, $attributes);

    public function setComment($user, $comment, $post, $parent);

    public function removePost($user, $id);

    public function removeComment($user, $id);
}