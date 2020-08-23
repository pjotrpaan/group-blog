<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  
  // Connected table
  protected $table = 'posts';
  // Primary key
  public $primaryKey =  'id';
  // Timestamps
  public $timestamps = true;

  // Connect user
  public function user() 
  {
    return $this->belongsTo('App\User');
  }

}