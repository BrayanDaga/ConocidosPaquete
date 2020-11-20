<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Multicaret\Acquaintances\Traits\CanLike;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function like(Post $post)
    {
        $user = User::find(auth()->user()->id);
        $user->like($post);
        return back();
    }

    public function unlike(Post $post)
    {
        $user = User::find(auth()->user()->id);
        $user->unlike($post);
        return back();
    }


}
