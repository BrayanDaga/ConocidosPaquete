<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::apiResource('users','Api\UserController');
Route::apiResource('posts','Api\PostController');


Route::match(['put', 'patch'], 'users/{user}/posts/{post}/like', 'Api\UserPostController@like');
Route::match(['put', 'patch'],'users/{user}/posts/{post}/unlike', 'Api\UserPostController@unlike');

Route::match(['put', 'patch'],'users/{user}/posts/{post}/upvote', 'Api\UserPostController@upVote');
Route::match(['put', 'patch'],'users/{user}/posts/{post}/downvote', 'Api\UserPostController@downVote');

Route::match(['put', 'patch'],'users/{user}/follow/{user1}', 'Api\UserController@follow');
Route::match(['put', 'patch'],'users/{user}/unfollow/{user1}', 'Api\UserController@unfollow');

Route::match(['put', 'patch'],'users/{user}/befriend/{recipient}', 'Api\UserController@beFriend');
Route::match(['put', 'patch'],'users/{user}/unfriend/{friend}', 'Api\UserController@unFriend');

Route::match(['put', 'patch'],'users/{user}/acceptfriend/{sender}', 'Api\UserController@acceptFriend');
Route::match(['put', 'patch'],'users/{user}/denyfriend/{sender}', 'Api\UserController@denyFriend');

Route::get('users/{user}/followings', 'Api\UserController@followings');
Route::get('users/{user}/followers', 'Api\UserController@followers');
Route::get('users/{user}/friends', 'Api\UserController@friends');
