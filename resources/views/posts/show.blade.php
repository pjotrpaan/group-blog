@extends('layouts.app')

@section('content')

  <div>
    <h1 class="single-post-h1">{{ $post->title }}</h1>
    <a href="/posts" class="btn btn-default pull-right">Back to posts</a>
    <small class="d-block">
      Author: {{ $post->user->name }}
      <br>Posted on: {{ $post->created_at->format('d. M Y H:i') }}
      @if ($post->created_at != $post->updated_at)
        <br>Updated on: {{ $post->updated_at->format('d. M Y H:i') }}
      @endif
    </small>
    <hr>
    <img src="" />
    <hr>
  </div>

  
  @if(!Auth::guest())
    @if(Auth::user()->id == $post->user_id)
      <div class="edit-section">
        <a href="/posts/{{ $post->id }}/edit" class="btn btn-default pull-left">Edit post</a>
        {!! Form::open([ 
          'action' => ['PostController@destroy', $post->id], 
          'method' => 'POST'
        ]) !!}
          {{ Form::hidden('_method', 'DELETE') }}
          {{ Form::submit('Delete post', [ 'class' => 'btn btn-danger pull-right' ]) }}
        {!! Form::close() !!}
      </div>
    @endif
  @endif

  <div class="well">
    <p>{!! $post->body !!}</p>
  </div>
  <hr>
  
@endsection('content')