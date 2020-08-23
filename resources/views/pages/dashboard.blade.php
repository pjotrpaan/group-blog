@extends('layouts.app')

@section('content')

  <div class="container">

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        @include('includes.create_post')
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
          <h3 class="panel-heading">Your saved posts</h3>
          @if (count($posts) > 0)
            <div class="panel-body">
              <table class="table table-striped">
                <tr>                      
                  <th>Title</th>
                  <th>Created</th>                       
                  <th>Updated</th>
                  <th>Body</th>
                  <th></th>
                  <th></th>                    
                </tr>
                @foreach ($posts as $post)
                  <tr>
                    <td>
                      <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </td>
                    <td>{{ $post->created_at }}</td>
                    <td>{{ $post->updated_at }}</td>
                    <td>{!! str_limit($post->body, $limit = 45, $end = '...') !!}</td>
                    <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit post</a></td>
                    <td>
                      {!! Form::open([ 
                        'action' => ['PostController@destroy', $post->id], 
                        'method' => 'POST'
                      ]) !!}
                        {{ Form::hidden('_method', 'DELETE') }}
                        {{ Form::submit('Delete', [ 'class' => 'btn btn-danger' ]) }}
                      {!! Form::close() !!}
                    </td>
                  </tr>
                @endforeach
              </table>
            </div>
          @else
            <p class="text-center">You have not published any posts.</p>
          @endif
        </div>
      </div>
    </div>

  </div>

@endsection
