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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }


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

    public function follows(User $user)
    {
        // return response()->json('follows');

        return json_encode('follows');
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
