<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	/**
     * Get the user that wrote the post.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Get the topic of the post
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

}
