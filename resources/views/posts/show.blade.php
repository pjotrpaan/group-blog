@extends('layouts.app')

@section('content')

  <div>
    <a href="/posts" class="btn btn-default back-btn pull-right">Back to posts</a>
    <img class="single-cover" src="/storage/cover_images/{{ $post->cover_image }}" />
    <h1 class="single-post-h1">{{ $post->title }}</h1>
    <div>
      <small class="d-block">
        Author: {{ $post->user->name }}
        <br>Posted on: {{ $post->created_at->format('d. M Y H:i') }}
        @if ($post->created_at != $post->updated_at)
          <br>Updated on: {{ $post->updated_at->format('d. M Y H:i') }}
        @endif
      </small>
    </div>
    <hr>
  </div>

  <div class="well">
    <p>{!! $post->body !!}</p>
  </div>

  @include('includes.edit_delete_btns')  

  @include('includes.comments')

@endsection('content')