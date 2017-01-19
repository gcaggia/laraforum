<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{   

    protected $fillable = ['user_id', 'topic_slug', 'title'];

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

    /**
     * Add a new post on the current topic
     */
    public function addPost(Post $post)
    {
        return $this->posts()->save($post);
    }
    
}
