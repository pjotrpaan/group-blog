@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      @include('includes.to_dashboard')
      <h1 class="single-post-h1">@lang('Edit post')</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10 col-md-offset-1 well">
    
      {!! Form::open([ 
        'action' => [ 'PostController@update', $post->id ], 
        'method' => 'POST', 
        'enctype' => 'multipart/form-data'
      ]) !!}

        <div class="form-group">
          {{ Form::label('title', __('Post title')) }}
          {{ Form::text('title',  $post->title, [ 
            'class' => 'form-control', 
            'placeholder' => __('Enter post title...')
          ]) }}
        </div>

        <div class="form-group">  
          {{ Form::label('body', __('Post body')) }}
          {{ Form::textarea('body', $post->body, [ 
            'id' => 'ckeditor', 
            'class' => 'form-control', 
            'placeholder' => __('Enter post body copy...')
          ]) }}
        </div>

        <div class="form-group">
          {{ Form::label('cover_image', __('Upload cover image (recommended size 1200x400px)')) }}
          {{ Form::file('cover_image') }}
        </div>

        {{ Form::hidden('_method', 'PUT') }}
        <button type="submit" class="btn btn-primary">@lang('Save edits')</button>
        
      {!! Form::close() !!}
  
    </div>
  </div>


@endsection('content')