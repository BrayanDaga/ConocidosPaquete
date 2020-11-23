<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
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
        $posts = Comment::whereNull('parent')->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Comment $comment)
    {
        return view('posts.show', compact('comment'));
    }

    public function like(Comment $comment)
    {
        $user = $this->currentUser();
        $user->like($comment);
        return back();
    }

    public function unlike(Comment $comment)
    {
        $user = $this->currentUser();
        $user->unlike($comment);
        return back();
    }
}
