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
        {{ App\Http\Controllers\DateController::formatDateByLocale($post->created_at, session()->get('locale')) }}
        @if ($post->created_at != $post->updated_at)
          <br>@lang('Updated on:') 
          {{ App\Http\Controllers\DateController::formatDateByLocale($post->created_at, session()->get('locale')) }}
        @endif
      </small>
    </div>
  </div>

  <div class="row">
    <p>{!! $post->body !!}</p>
  </div>
  <div class="row">
  @include('includes.edit_delete_btns')  

  @include('includes.comments')
  </div>
</div>
@endsection('content')