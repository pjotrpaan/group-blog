<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  /**
   * Connected table
   */
  protected $table = 'posts';

  /**
   *  Primary id
   */
  public $primaryKey =  'id';

  /**
   * Timestamps
   */
  public $timestamps = true;

  /**
   * Get the user for the blog post
   */
  public function user() 
  {
    return $this->belongsTo('App\User');
  }

  /**
   * Get the comments for the blog post
   */
  public function comments()
  {
    return $this->hasMany('App\Models\Comment');
  }
}