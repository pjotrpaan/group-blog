@extends('layouts.app')

@section('content')
<!-- Create post section -->
<div class="container create">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      @include('includes.to_dashboard')
      <h1 class="single-post-h1">@lang('Create post')</h1>
    </div>
  </div>
  <div class="row">
    <div class="col-md-10 col-md-offset-1 well">
    <!-- Create post form -->
      {!! Form::open([ 
        'action' => 'PostController@store', 
        'method' => 'POST', 
        'enctype' => 'multipart/form-data'
      ]) !!}
        <div class="form-group">
          {{ Form::label('title', __('Post title')) }}
          {{ Form::text('title', '', [ 
            'class' => 'form-control', 
            'placeholder' => __('Enter post title...')
          ]) }}
        </div>
        <div class="form-group">  
          {{ Form::label('body', __('Post body')) }}
          {{ Form::textarea('body', '', [ 
            'id' => 'ckeditor', 
            'class' => 'form-control', 
            'placeholder' => __('Enter post body copy...')
          ]) }}
        </div>
        <div class="form-group">
          {{ Form::label('cover_image', __('Upload cover image (recommended size 1200x400px)')) }}
          {{ Form::file('cover_image') }}
        </div>
        <button type="submit" class="btn btn-primary">@lang('Submit post')</button>
      {!! Form::close() !!}
    </div>
  </div>
</div>

@endsection('content')