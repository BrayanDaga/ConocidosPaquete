<?php

namespace App;

use App\User;
use App\Comment;
use Illuminate\Database\Eloquent\Model;
use Multicaret\Acquaintances\Traits\CanBeLiked;
use Multicaret\Acquaintances\Traits\CanBeRated;
use Multicaret\Acquaintances\Traits\CanBeVoted;
use Multicaret\Acquaintances\Traits\CanBeFavorited;


class Post extends Model
{
    use CanBeLiked, CanBeFavorited, CanBeVoted, CanBeRated;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
