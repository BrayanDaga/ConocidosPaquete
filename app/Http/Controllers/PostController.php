<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Multicaret\Acquaintances\Traits\CanLike;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function currentUser()
    {
        return  User::find(Auth::user()->id);
    }

    public function index()
    {
        $posts = Post::all();
        $user = $this->currentUser();
        return view('posts.index', compact('posts','user'));
    }

    public function show(Post $post)
    {
        $user = $this->currentUser();
        return view('posts.show', compact('post','user'));
    }

    public function like(Post $post)
    {
        $user = $this->currentUser();
        $user->like($post);
        return back();
    }

    public function unlike(Post $post)
    {
        $user = $this->currentUser();
        $user->unlike($post);
        return back();
    }

    public function upVote(Post $post)
    {
        $user = $this->currentUser();
        $user->upvote($post);
        return back();
    }

    public function downVote(Post $post)
    {
        $user = $this->currentUser();
        // $user->cancelVote($post);
        $user->downvote($post);
        return back();
    }


}
