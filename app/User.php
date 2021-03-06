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
        'name', 'email', 'password',
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
     * Get the posts from user.
     */
    public function posts() 
    {
      return $this->hasMany('App\Models\Post');
    }

    /**
     * Get the comments for the user.
     */
    public function comments()
    {
      return $this->hasMany('App\Models\Comment');
    }
}
