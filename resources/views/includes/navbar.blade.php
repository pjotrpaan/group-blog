<nav class="navbar navbar-inverse navbar-fixed-top">

  <div class="container">

    <div class="navbar-header">
      <button type="button" 
        class="navbar-toggle collapsed" 
        data-toggle="collapse" 
        data-target=".navbar-collapse">
        <span class="sr-only">@lang('Toggle navigation')</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
        <b>@lang('Group Blog App')</b>
      </a>
    </div>

    <div class="collapse navbar-collapse">

      <!-- Left Side Of Navbar -->
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? 'active' : '' }}">
          <a href="/">@lang('Home')</a>
        </li>
        <li class="{{ Request::is('posts') ? 'active' : '' }}">
          <a href="/posts">@lang('Posts')</a>
        </li>
      </ul>
      
      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right">
        <!-- Localization Links -->
        @php $locale = session()->get('locale'); @endphp
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                @if ($locale == 'en')
                  <img src="{{asset('storage/lang_images/uk.png')}}" width="27px" height="18px"> EN
                @elseif ($locale == 'et')
                  <img src="{{asset('storage/lang_images/est.png')}}" width="27px" height="18px"> ET
                @endif
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right location-dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="/en"><img src="{{asset('storage/lang_images/uk.png')}}" width="27px" height="18px"> EN</a>
                <a class="dropdown-item" href="/et"><img src="{{asset('storage/lang_images/est.png')}}" width="27px" height="18px"> ET</a>
            </div>
        </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
          <li><a href="{{ route('login') }}">@lang('Login')</a></li>
          <li><a href="{{ route('register') }}">@lang('Register')</a></li>
        @else
        <!-- Authenticated User Links -->
          <li class="dropdown">
            <a href="#" 
              class="dropdown-toggle" 
              data-toggle="dropdown" 
              role="button" 
              aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="/dashboard">@lang('Dashboard')</a></li>
              <li>
                <a href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  @lang('Logout')
                </a>
                <form id="logout-form" 
                  action="{{ route('logout') }}" 
                  method="POST" 
                  style="display: none;">
                  {{ csrf_field() }}
                </form>
              </li>
            </ul>
          </li>
        @endif
      </ul>

    </div>

  </div>
  
</nav>
