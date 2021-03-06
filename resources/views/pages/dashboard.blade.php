@extends('layouts.app')

@section('content')
<!-- Dashboard section -->
<div class="container dashboard">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        @include('includes.create_post')
      </div>
    </div>
    <div class="row well">
      <div class="col-md-12 col-sm-12 dashboard-container">
        <h1>@lang('Your saved posts')</h1>
        @if (count($posts) > 0)
          <table class="table table-striped">
            <tr>                      
              <th>@lang('Title')</th>
              <th>@lang('Created')</th>                       
              <th>@lang('Updated')</th>
              <th>@lang('Edit')</th>
              <th>@lang('Delete')</th>                    
            </tr>
            @foreach ($posts as $post)
              <tr>
                <td>
                  <a href="/posts/{{ $post->id }}"><b>{{ $post->title }}</b></a>
                </td>
                <td>
                  {{ App\Http\Controllers\DateController::formatDateByLocale($post->created_at, session()->get('locale')) }}
                </td>
                <td>
                  {{ App\Http\Controllers\DateController::formatDateByLocale($post->created_at, session()->get('locale')) }}
                </td>
                <td>
                  {!! Form::open([ 
                    'action' => ['PostController@edit', $post->id],
                    'method' => 'GET'
                  ]) !!}
                    <button type="submit" class="btn btn-primary btn-xs">@lang('Edit')</button>
                  {!! Form::close() !!}
                </td>
                <td>
                  {!! Form::open([ 
                    'action' => ['PostController@destroy', $post->id], 
                    'method' => 'POST'
                  ]) !!}
                    {{ Form::hidden('_method', 'DELETE') }}
                    <button type="submit" class="btn btn-danger btn-xs">@lang('Delete')</button>
                  {!! Form::close() !!}
                </td>
              </tr>
            @endforeach
          </table>
        @else
          <p class="text-center">@lang('You have not published any posts.')</p>
        @endif
      </div>
    </div>
  </div>
  
@endsection
