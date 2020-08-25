<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth', [ 'except' => [ 'index', 'show' ] ]);
  }
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $posts = Post::orderBy('created_at', 'desc')->paginate(10);
    return view('posts.index')->with('posts', $posts);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('posts.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    // Validate form fields
    $this->validate($request, [
      'title' => 'required',
      'body' => 'required',
      'cover_image' => 'image|nullable|max:1999',
    ]);

    // Handle file upload
    if ($request->hasFile('cover_image')) 
    {
      $coverImageToStore = StoreController::saveFile($request, 'cover_image');
    }
    else
    {
      $coverImageToStore = 'cover_placeholder_1200x400px.jpg';
    }

    // Create post
    $post = new Post;
    $post->title = $request->input('title');
    $post->body = $request->input('body');
    $post->user_id = auth()->user()->id;
    $post->cover_image = $coverImageToStore;
    $post->save();
    return redirect('/posts/')->with('success', __('Blog post successfully created!'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $post = Post::find($id);
    return view('posts.show')->with('post', $post);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $post = Post::find($id);

    // Don't allow unregistered users edit posts
    if (auth()->user()->id !== $post->user_id) 
    {
      return redirect('/posts')->with('error', __('You are not authorised to edit posts.'));
    }

    return view('posts.edit')->with('post', $post);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // Validate form fields
    $this->validate($request, [
      'title' => 'required',
      'body' => 'required',
      'cover_image' => 'image|nullable|max:1999',
    ]);
    
    // Update post
    $post = Post::find($id);
    $post->title = $request->input('title');
    $post->body = $request->input('body');
    if ($request->hasFile('cover_image')) 
    {
      Storage::delete('public/cover_images/' . $post->cover_image);
      $post->cover_image = StoreController::saveFile($request, 'cover_image');
    }
    $post->save();
    return redirect('/posts/'.$id)->with('success', __('Blog post successfully updated!'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $post = Post::find($id);

    // Don't allow unregistered users delete posts
    if (auth()->user()->id !== $post->user_id) 
    {
      return redirect('/posts')->with('error', __('You are not authorised to delete posts.'));
    }

    // Delete uploaded cover from storage
    if ($post->cover_image != 'cover_placeholder_1200x400px.jpg') 
    {
      Storage::delete('public/cover_images/'.$post->cover_image);
    }
    $post->delete();
    return redirect('/posts')->with('success', __('Blog post successfully deleted!'));
  }

}
