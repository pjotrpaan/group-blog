<!-- Navbar section -->
<div class="container-fluid">
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <!-- Left Side Of Navbar -->
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
        <a class="navbar-brand" href="/" aria-hidden="true" tabindex="-1">
          <img src="/storage/cover_images/logo-big.png" alt="">
        </a>
      </div>
      <div class="collapse navbar-collapse">
        @php $locale = session()->get('locale'); @endphp
        <ul class="nav navbar-nav">
          <!-- Pages links -->
          <li class="{{ Request::is($locale) ? 'active' : '' }}">
            <a href="/">@lang('Home')</a>
          </li>
          <li class="{{ Request::is($locale.'/posts') || Request::is($locale.'/postitused') ? 'active' : '' }}">
            <a href="/posts">@lang('Posts')</a>
          </li>
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Localization links -->
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              @if ($locale == 'en')
                <img src="{{asset('storage/lang_images/uk.png')}}" alt="" width="27px" height="18px"> EN
              @elseif ($locale == 'et')
                <img src="{{asset('storage/lang_images/est.png')}}" alt="" width="27px" height="18px"> ET
              @endif
              <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right location-dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="/en"><img src="{{asset('storage/lang_images/uk.png')}}" alt="" width="27px" height="18px"> EN</a>
              <a class="dropdown-item" href="/et"><img src="{{asset('storage/lang_images/est.png')}}" alt="" width="27px" height="18px"> ET</a>
            </div>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication links -->
          @if (Auth::guest())
            <li class="{{ Request::is($locale.'/login') ? 'active' : '' }}">
              <a href="{{ route('login') }}">@lang('Login')</a>
            </li>
            <li class="{{ Request::is($locale.'/register') ? 'active' : '' }}">
              <a href="{{ route('register') }}">@lang('Register')</a>
            </li>
          @else
          <!-- Authenticated user links -->
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
                <li><a href="/">@lang('Home')</a></li>
                <li><a href="/posts">@lang('Posts')</a></li>
                <li>
                  <a href="{{  \LaravelLocalization::localizeURL('/logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    @lang('Logout')
                  </a>
                  <form id="logout-form" 
                    action="{{  \LaravelLocalization::localizeURL('/logout') }}" 
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
</div>