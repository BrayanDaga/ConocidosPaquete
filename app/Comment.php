<?php

namespace App;

use App\Post;
use Illuminate\Database\Eloquent\Model;
use Multicaret\Acquaintances\Traits\CanBeLiked;

class Comment extends Model
{
    use CanBeLiked;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
