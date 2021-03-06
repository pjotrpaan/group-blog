@extends('layouts.app')

@section('content')
<!-- Index page content -->
<div class="container index">
  <div class="row well text-center">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <h1>@lang('Group Blog App')</h1>
      <hr>
      <p>@lang('Welcome to the coolest blog on the planet!')</p>
      @if(!Auth::guest())
        {!! Form::open([ 
          'action' => 'PostController@create', 
          'method' => 'GET', 
          'enctype' => 'multipart/form-data'
        ]) !!}
          <button type="submit" class="btn btn-primary create-btn">@lang('Create new post')</button> 
        {!! Form::close() !!}
      @endif
    </div>
  </div>
  <div class="row equal well">
    <div class="col-md-12 col-sm-12">
      <h2>Latest posts</h2>
    </div>
    @if(count($posts) > 0)
      @foreach ($posts as $post)
      <div class="col-md-4 col-sm-4">
        <div class="row well">
          <div class="col-md-12 col-sm-12 p-0">
            <img class="list-item-cover" src="/storage/cover_images/{{ $post->cover_image }}" />
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <h3>
              <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h3>
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
      @endforeach
      {{ $posts->links() }}
    </div>
    @else
    <div class="col-lg-12 col-md-12 col-sm-12 jumbotron">
      <p>@lang('Oops! No blog posts available. You could be the first one to create a post.')</p>
    </div>
    @endif 
  </div>
</div>

@endsection('content')