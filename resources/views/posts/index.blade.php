@extends('layouts.app')

@section('content')
<div class="container main">
  <div>
    @include('includes.create_post')
    <h1>@lang('Latest blog posts')</h1>
  </div>
  
  <div class="row equal">
    @if(count($posts) > 0)
      @foreach ($posts as $post)
      <div class="col-md-6 col-sm-6">
        <div class="well">
          <div class="col-md-12 col-sm-12 p-0">
            <img class="list-item-cover" src="/storage/cover_images/{{ $post->cover_image }}" />
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
              <h2>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
              </h2>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12">
              <small>
                @lang('By') {{ $post->user->name }}
                <br>@lang('Posted on:') 
                {{ App\Http\Controllers\DateController::formatDateByLocale($post->created_at, session()->get('locale')) }}
                @if ($post->created_at != $post->updated_at)
                  <br>@lang('Updated on:') 
                  {{ App\Http\Controllers\DateController::formatDateByLocale($post->created_at, session()->get('locale')) }}
                @endif
              </small>
            </div>
          </div>

        </div>
      </div>       
      @endforeach
      {{ $posts->links() }}
    </div>
    @else
      <p class="">@lang('Oops! No blog posts available. You could be the first one to create a post.')</p>
    @endif 
  </div>
@endsection('content')