<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }
  
  /**
   * Display a index page with title.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $title = 'Group Blog Home Page';
    return view('pages.index')->with('title', $title);
  }
}
