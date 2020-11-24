<?php

namespace App\Http\Controllers\Api;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class UserPostController extends Controller
{
    public function like(User $user, Post $post)
    {
        $user->like($post);
        return new PostResource($post);
    }

    public function unlike(User $user, Post $post)
    {
        $user->unlike($post);
        return new PostResource($post);
    }

    public function upVote(User $user, Post $post)
    {
        $user->upvote($post);
        return new PostResource($post);
    }

    public function downVote(User $user, Post $post)
    {
        $user->downvote($post);
        return new PostResource($post);
    }
}
