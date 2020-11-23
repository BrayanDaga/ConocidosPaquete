<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    private function currentUser()
    {
        return  User::find(Auth::user()->id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $cUser = $this->currentUser();
        return view('users.index', compact('users','cUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function follow(User $user)
    {
        $cUser = $this->currentUser();
        if($cUser == $user){
            return back();
        }
        $cUser->follow($user);
        return back();
    }

    public function unfollow(User $user)
    {
        $cUser = $this->currentUser();
        $cUser->unfollow($user);
        return back();
    }

    public function follows()
    {
        $cUser = $this->currentUser();
        $followings = $cUser->followings()->get();
        $followers = $cUser->followers()->get();

        return view('users.follows',compact('cUser','followings','followers'));
    }

    public function befriend(User $user)
    {
        $cUser = $this->currentUser();
        if($cUser == $user){
            return back();
        }
        $cUser->befriend($user);
        return back();
    }

    public function unFriend(User $user)
    {
        $cUser = $this->currentUser();
        if($cUser == $user){
            return back();
        }
        $cUser->unfriend($user);
        return back();
    }


    public function friends()
    {
        $cUser = $this->currentUser();
        $friends = $cUser->getAcceptedFriendships();
        $pendings = $cUser->getPendingFriendships();
        $requests = $cUser->getFriendRequests();
        return view('users.friends',compact('cUser','friends','pendings','requests'));
    }

    public function acceptFriend(User $user)
    {
        $cUser = $this->currentUser();
        if($cUser == $user){
            return back();
        }
        $cUser->acceptFriendRequest($user);
        return back();
    }

    public function denyFriend(User $user)
    {
        $cUser = $this->currentUser();
        if($cUser == $user){
            return back();
        }
        $cUser->denyFriendRequest($user);
        return back();
    }

}
