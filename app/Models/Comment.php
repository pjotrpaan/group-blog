<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
 
class Comment extends Model
{ 
  // fields can be filled
  protected $fillable = [
    'body', 
    'user_id', 
    'post_id'
  ];
 
  /**
   * Get comment post.
   */
  public function post()
  {
    return $this->belongsTo('App\Models\Post');
  }
 
  /**
   * Get comment user.
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
