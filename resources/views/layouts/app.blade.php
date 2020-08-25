<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@lang('Group Blog App')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>

  <body>
    <!-- App container -->
    <div>
      @include('includes.navbar')
      <div class="container main">
        @include('includes.messages')
        <!-- Page content -->
        @yield('content')
      </div>
    </div>
    <!-- Scripts -->
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    @if(\Request::is('*/edit') OR \Request::is('*/create'))
      <script>
        CKEDITOR.replace( 'ckeditor', {
          filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
          filebrowserUploadMethod: 'form'
        });
      </script>
    @endif
  </body>
</html>
