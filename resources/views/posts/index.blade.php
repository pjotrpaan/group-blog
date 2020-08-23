@extends('layouts.app')

@section('content')

  <div>
    @include('includes.create_post')
    <h1>Latest blog posts</h1>
  </div>
  
  @if(count($posts) > 0)''
    @foreach ($posts as $post)
    <div class="col-md-6 col-sm-6">
      <div class="row well">

        <div class="row">
          <div class="col-md-6 col-sm-6">
            <h2>
              <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
            </h2>
            <small>Author: {{ $post->user->name }}
              <br>Posted on: {{ $post->created_at->format('d. M Y H:i') }}
              @if ($post->created_at != $post->updated_at)
                <br>Updated on: {{ $post->updated_at->format('d. M Y H:i') }}
              @endif
            </small>
          </div>

          <div class="col-md-6 col-sm-6">
            <p>{!! str_limit($post->body, $limit = 212, $end = '...') !!}</p>
          </div>
        </div>

      </div>
    </div>       
    @endforeach
    {{ $posts->links() }}
  @else
    <p class="">Oops! No blog posts available. You could be the first one to create a post.</p>
  @endif 

@endsection('content')