<!-- Create post button section -->
@if(!Auth::guest())
  {!! Form::open([ 
    'action' => 'PostController@create', 
    'method' => 'GET', 
    'enctype' => 'multipart/form-data'
  ]) !!}
    <button type="submit" class="btn btn-primary create-btn pull-right">@lang('Create new post')</button> 
  {!! Form::close() !!}
@endif