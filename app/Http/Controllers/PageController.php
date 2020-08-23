<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
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
