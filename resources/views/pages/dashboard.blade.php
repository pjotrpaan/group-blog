@extends('layouts.app')

@section('content')


    <div class="row">
      <div class="col-md-10 col-md-offset-1 col-xs-offset-1">
        @include('includes.create_post')
      </div>
    </div>

    <div class="row">
      <div class="col-md-10 col-md-offset-1 dashboard-container">
          <h3>@lang('Your saved posts')</h3>
          @if (count($posts) > 0)
              <table class="table table-striped">
                <tr>                      
                  <th>@lang('Title')</th>
                  <th>@lang('Created')</th>                       
                  <th>@lang('Updated')</th>
                  <th>@lang('Body')</th>
                  <th>@lang('Edit')</th>
                  <th>@lang('Delete')</th>                    
                </tr>
                @foreach ($posts as $post)
                  <tr>
                    <td>
                      <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                    </td>
                    <td>{{ $post->created_at->format('d. M Y H:i') }}</td>
                    <td>{{ $post->updated_at->format('d. M Y H:i') }}</td>
                    <td>{!! str_limit($post->body, $limit = 45, $end = '...') !!}</td>
                    <td><a href="/posts/{{ $post->id }}/edit" class="btn btn-default">@lang('Edit')</a></td>
                    <td>
                      {!! Form::open([ 
                        'action' => ['PostController@destroy', $post->id], 
                        'method' => 'POST'
                      ]) !!}
                        {{ Form::hidden('_method', 'DELETE') }}
                        <button type="submit" class="btn btn-danger">@lang('Delete')</button>
                      {!! Form::close() !!}
                    </td>
                  </tr>
                @endforeach
              </table>
          @else
            <p class="text-center">You have not published any posts.</p>
          @endif
      </div>
    </div>

  

@endsection
