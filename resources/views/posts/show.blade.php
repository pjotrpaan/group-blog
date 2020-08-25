@extends('layouts.app')

@section('content')
<div class="container main">
  <div class="row single-post-heading">
    <a href="/posts" class="btn btn-default back-btn pull-right">@lang('Back to posts')</a>
    <img class="single-cover" src="/storage/cover_images/{{ $post->cover_image }}" />
    <h1 class="single-post-h1">{{ $post->title }}</h1>
    <div>
      <small>
        @lang('By') {{ $post->user->name }}
        <br>@lang('Posted on:') {{ $post->created_at->format('d. M Y H:i') }}
        @if ($post->created_at != $post->updated_at)
          <br>@lang('Updated on:') {{ $post->updated_at->format('d. M Y H:i') }}
        @endif
      </small>
    </div>
  </div>

  <div class="row well">
    <p>{!! $post->body !!}</p>
  </div>
  <div class="row">
  @include('includes.edit_delete_btns')  

  @include('includes.comments')
  </div>
</div>
@endsection('content')