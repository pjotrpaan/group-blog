@if(!Auth::guest())
  @if(Auth::user()->id == $post->user_id)
    <div class="edit-section">
      <a href="/posts/{{ $post->id }}/edit" class="btn btn-default pull-left">@lang('Edit post')</a>
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