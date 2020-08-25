<div class="comments-container">
  <h3>@lang('Comments')</h3>
  <br>
  @forelse ($post->comments as $comment)
    <p>{{ $comment->body }}</p>
    <small>
      <em>
        @if ($comment->user_id == 0) 
          @lang('By: anonymous user')
        @else
          @lang('By:') {{ $comment->user->name }}
        @endif
        <br>
        {{$comment->created_at->format('d. M Y H:i')}}
      </em>
    </small>
    <p>
      @if(!Auth::guest() && Auth::user()->id == $comment->user_id)
        {!! Form::open([ 
          'action' => ['CommentController@destroy', $comment], 
          'method' => 'POST'
        ]) !!}
          {{ Form::hidden('_method', 'DELETE') }}
          <button type="submit" class="btn btn-light btn-sm mt-15">@lang('Delete comment')</button>
        {!! Form::close() !!}
      @endif
    </p>
    <hr>
  @empty
    <p class="text-center"><b>@lang('This post has no comments')</b></p>
  @endforelse

  {!! Form::open([ 
    'action' => 'CommentController@store', 
    'method' => 'POST', 
    'enctype' => 'multipart/form-data'
  ]) !!}

    <div class="form-group">
      {{ Form::label('body', __('Add comment')) }}
      {{ Form::textarea('body', '', [ 
        'class' => 'form-control', 
        'placeholder' => __('Enter comment...')
      ]) }}
    </div>

    @if(Auth::guest())
      {!! Form::hidden('user_id', 0) !!}
    @else
      {!! Form::hidden('user_id', Auth::user()->id) !!}
    @endif

    {!! Form::hidden('post_id', $post->id) !!}
    <button type="submit" class="btn btn-primary btn-block btn-lg">@lang('Submit comment')</button>
    
  {!! Form::close() !!}

</div>