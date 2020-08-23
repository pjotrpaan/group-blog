@if(!Auth::guest())
  <a href="/posts/create" class="btn btn-primary create-btn pull-right">Create new post</a>
@endif