<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\StoreController;

class CkeditorController extends Controller
{
  /**
   * Store a uploaded resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return 
   */
  public function upload(Request $request)
  {
    if($request->hasFile('upload')) 
    {
      //filename to store
      $filenameToStore = StoreController::saveFile($request, 'upload');

      $CKEditorFuncNum = $request->input('CKEditorFuncNum');
      $url = asset('storage/upload/'.$filenameToStore);
      $msg = 'File upload successful!';
      $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
        
      // Render HTML output
      @header('Content-type: text/html; charset=utf-8');
      echo $re;
    }
  }
}
