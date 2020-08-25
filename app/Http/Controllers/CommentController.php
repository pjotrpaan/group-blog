<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $comment = new Comment;
    $comment->body = $request->body;
    $comment->user_id = $request->user_id;
    $comment->post_id = $request->post_id;
    $comment->save();
    return redirect()->route('posts.show', $request->post_id)->with('success', __('New comment successfully added!'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Comment  $comment
   * @return \Illuminate\Http\Response
   */
  public function destroy(Comment $comment)
  {
    $comment = Comment::find($comment->id);
    $comment ->delete();
    return redirect()->route('posts.show', $comment->post->id)->with('success', __('Comment successfully deleted!'));
  }
}
