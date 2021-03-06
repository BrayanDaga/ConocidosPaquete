<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('posts', 'PostController');
    Route::resource('users', 'UserController');


    Route::get('posts/{post}/like', 'PostController@like')->name('posts.like');
    Route::get('posts/{post}/unlike', 'PostController@unlike')->name('posts.unlike');

    Route::get('posts/{post}/upvote', 'PostController@upVote')->name('posts.upvote');
    Route::get('posts/{post}/downvote', 'PostController@downVote')->name('posts.downvote');

    Route::get('comments/{comment}/like', 'CommentController@like')->name('comments.like');
    Route::get('comments/{comment}/unlike', 'CommentController@unlike')->name('comments.unlike');

    Route::get('user/{user}/follow', 'UserController@follow')->name('user.follow');
    Route::get('user/{user}/unfollow', 'UserController@unfollow')->name('user.unfollow');

    Route::get('user/follows', 'UserController@follows')->name('user.follows');

    Route::get('user/{user}/befriend', 'UserController@beFriend')->name('user.befriend');
    Route::get('user/{user}/unfriend', 'UserController@unFriend')->name('user.unfriend');

    Route::get('user/friends', 'UserController@friends')->name('user.friends');
    Route::get('user/{user}/acceptfriend', 'UserController@acceptFriend')->name('user.acceptfriend');
    Route::get('user/{user}/denyfriend', 'UserController@denyFriend')->name('user.denyfriend');

});
