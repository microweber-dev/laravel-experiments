<?php

namespace Modules\Vote\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Blog\Entities\Post;

class Vote extends Model
{
    protected $fillable = [];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}