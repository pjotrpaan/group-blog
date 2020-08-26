<!-- Messages section -->
<div class="container messages">
  <div class="row">
    <div class="col-md-4 col-md-offset-4 text-center p-0">
      <b>
        <!-- Errors message -->
        @if(count($errors) > 0)
          @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
              {{ ucfirst($error) }}
            </div>   
          @endforeach
        @endif
        <!-- Success message -->
        @if(session('success'))
          <div class="alert alert-success">            
            {{ ucfirst(session('success')) }}         
          </div>
        @endif
        <!-- Session error message -->
        @if(session('error'))
          <div class="alert alert-danger">  
            {{ ucfirst(session('error')) }}
          </div>
        @endif
      </b>
    </div>
  </div>
</div>