<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

        /**
     * Get members full name
     * 
     * @return string
     */
    public function getNameAttribute()
    {
        return ucfirst($this->firstname) . ' ' . ucfirst($this->lastname);
    }

    /**
     * Get the posts of this user.
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    /**
     * Get the topics of this user.
     */
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
    
}
