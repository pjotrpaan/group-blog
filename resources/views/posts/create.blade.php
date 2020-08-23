@extends('layouts.app')

@section('content')

  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <h1 class="single-post-h1">Create post</h1>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10 col-md-offset-1 well">
    
      {!! Form::open([ 
        'action' => 'PostController@store', 
        'method' => 'POST', 
        'enctype' => 'multipart/form-data'
      ]) !!}

        <div class="form-group">
          {{ Form::label('title', 'Post title') }}
          {{ Form::text('title', '', [ 
            'class' => 'form-control', 
            'placeholder' => 'Enter post title...' 
          ]) }}
        </div>

        <div class="form-group">  
          {{ Form::label('body', 'Post body') }}
          {{ Form::textarea('body', '', [ 
            'id' => 'article-ckeditor', 
            'class' => 'form-control', 
            'placeholder' => 'Enter post body copy...' 
          ]) }}
        </div>

        <div class="form-group">
          {{ Form::label('cover_image', 'Upload cover image (recommended size 1200x400px)') }}
          {{ Form::file('cover_image') }}
        </div>

        {{ Form::submit('Submit post', [ 'class' => 'btn btn-primary' ]) }}
        
      {!! Form::close() !!}
  
    </div>
  </div>


@endsection('content')