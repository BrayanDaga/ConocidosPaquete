<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Post $post)
    {
        //
    }

    public function like(User $user, Post $post)
    {
        $user->like($post);
        return $post;
    }

    public function unlike(User $user, Post $post)
    {
        $user->unlike($post);
        return $post;
    }

    public function upVote(User $user, Post $post)
    {
        $user->upvote($post);
        return $post;
    }

    public function downVote(User $user, Post $post)
    {
        $user->downvote($post);
        return $post;
    }
}
