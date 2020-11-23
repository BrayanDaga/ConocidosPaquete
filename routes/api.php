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

Route::post('users/{user}/posts/{post}/like', 'Api\UserPostController@like');
Route::post('users/{user}/posts/{post}/unlike', 'Api\UserPostController@unlike');

Route::post('users/{user}/posts/{post}/upvote', 'Api\UserPostController@upVote');
Route::post('users/{user}/posts/{post}/downvote', 'Api\UserPostController@downVote');
