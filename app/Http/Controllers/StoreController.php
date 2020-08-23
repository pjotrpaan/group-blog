<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StoreController extends Controller
{
  /**
   * Store a uploaded resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return String
   */
  public static function saveFile($request, $destination)
  {
    // Handle file upload
    if ($request->hasFile('cover_image')) 
    {
      // Prepare file and name with extension
      $uploadedFileNameWithExt = $request->file('cover_image')->getClientOriginalName();
      $fileName = pathinfo($uploadedFileNameWithExt, PATHINFO_FILENAME);
      $fileExt = $request->file('cover_image')->getClientOriginalExtension();
      $coverImageToStore = $fileName.'_'.time().'.'.$fileExt; 
      // Store file
      $path = $request->file('cover_image')->storeAs('public/'.$destination, $coverImageToStore);
      return $coverImageToStore;
    } 
    else 
    {
      // If no image added
      return 'cover_placeholder_1200x400px.jpg';
    }
  }
}
