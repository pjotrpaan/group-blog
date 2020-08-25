@if(!Auth::guest())
  @if(Auth::user()->id == $post->user_id)
    <div class="edit-section">
      {!! Form::open([ 
        'action' => ['PostController@edit', $post->id], 
        'method' => 'GET', 
        'enctype' => 'multipart/form-data'
      ]) !!}
        <button type="submit" class="btn btn-default create-btn pull-left">@lang('Edit post')</button> 
      {!! Form::close() !!}
      {!! Form::open([ 
        'action' => ['PostController@destroy', $post->id], 
        'method' => 'POST'
      ]) !!}
        {{ Form::hidden('_method', 'DELETE') }}
        <button type="submit" class="btn btn-danger pull-right">@lang('Delete post')</button>
      {!! Form::close() !!}
    </div>
    <hr>
  @endif
@endif