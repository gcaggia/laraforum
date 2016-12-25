<?php

namespace LaraForum;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{   

    /**
     * Get the posts for the topic.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    /**
     * Get the user that wrote the topic.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Get the category of this topic
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
