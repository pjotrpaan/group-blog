<div class="comments-container">
  <h3>Comments</h3>
  <br>
  @forelse ($post->comments as $comment)
    <p>{{ $comment->body }}</p>
    <small>
      <em>
        @if ($comment->user_id == 0) 
          By anonymous user
        @else
          By {{ $comment->user->name }}
        @endif
        on {{$comment->created_at->format('d. M Y H:i')}}
      </em>
    </small>
    <p>
      @if(!Auth::guest() && Auth::user()->id == $comment->user_id)
        {!! Form::open([ 
          'action' => ['CommentController@destroy', $comment], 
          'method' => 'POST'
        ]) !!}

          {{ Form::hidden('_method', 'DELETE') }}

          {{ Form::submit('Delete comment', [ 'class' => 'btn btn-light btn-sm mt-15' ]) }}

        {!! Form::close() !!}
      @endif
    </p>
    <hr>
  @empty
    <p class="text-center"><b>This post has no comments</b></p>
  @endforelse

  {!! Form::open([ 
    'action' => 'CommentController@store', 
    'method' => 'POST', 
    'enctype' => 'multipart/form-data'
  ]) !!}

    <div class="form-group">
    
      {{ Form::label('body', 'Add comment') }}

      {{ Form::textarea('body', '', [ 
        'class' => 'form-control', 
        'placeholder' => 'Enter comment...' 
      ]) }}

    </div>

    @if(Auth::guest())

      {!! Form::hidden('user_id', 0) !!}

    @else

      {!! Form::hidden('user_id', Auth::user()->id) !!}

    @endif

    {!! Form::hidden('post_id', $post->id) !!}

    {{ Form::submit('Submit comment', [ 
      'class' => 'btn btn-primary btn-block btn-lg' ]) }}
    
  {!! Form::close() !!}

</div>