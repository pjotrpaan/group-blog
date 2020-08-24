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
    // Prepare file and name with extension
    $uploadedFileNameWithExt = $request->file($destination)->getClientOriginalName();
    $fileName = pathinfo($uploadedFileNameWithExt, PATHINFO_FILENAME);
    $fileExt = $request->file($destination)->getClientOriginalExtension();
    $fileNameToStore = $fileName.'_'.time().'.'.$fileExt; 
    // Store file
    $path = $request->file($destination)->storeAs('public/'.$destination, $fileNameToStore);
    return $fileNameToStore;
  }
}
