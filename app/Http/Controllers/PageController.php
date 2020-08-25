<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
    $posts = Post::orderBy('created_at', 'desc')->paginate(6);
    return view('pages.index')->with([
      'title' => $title,
      'posts' => $posts,
    ]);
  }
}
