<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  new UserCollection(User::all());
        return $users;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = new UserResource($user);
        return $user;
    }


    public function follow(User $user, User $user1)
    {
        if($user == $user1){
            return response()->json(['error'=>'No puedes seguirte a ti mismo']);
        }
        $user->follow($user1);
        return response()->json(['data'=>'empezaste de seguir a '. $user1->name]);
    }

    public function unfollow(User $user, User $user1)
    {
        $user->unfollow($user1);
        return response()->json(['data'=>'dejaste de seguir a '. $user1->name]);

    }


    public function befriend(User $user, User $recipient)
    {
        $user->befriend($recipient);
        return $user->getFriendship($recipient);
        // ->get(['status','id','recipient_id'])
    }

    public function unFriend(User $user, User $friend)
    {
        $user->unfriend($friend);
        return $user->getFriendship($friend);

    }

    public function acceptFriend(User $user, User $sender)
    {
        $user->acceptFriendRequest($sender);
        return $user->getFriendship($sender);
    }

    public function denyFriend(User $user, User $sender)
    {
        $user->denyFriendRequest($sender);
        return $user->getFriendship($sender);
    }

    public function followings(User $user)
    {
        return $user->followings()->get();
    }

    public function followers(User $user)
    {

        return $user->followers()->get();
    }

    public function friends(User $user)
    {
        $friends =  $user->getAcceptedFriendships();
        $users = [];
        foreach ($friends as $friend) {
            if($friend->sender->id != $user->id){
                $users[] = User::find($friend->sender->id);
            }
            elseif($friend->recipient->id != $user->id){
                $users[] = User::find($friend->recipient->id);
            }
        }
        return   new UserCollection($users);
    }
}
