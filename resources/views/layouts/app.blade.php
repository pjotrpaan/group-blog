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
  <body style="background-image:url({{ asset("storage/cover_images/ian-dooley-DuBNA1QMpPA-unsplash.jpg") }});">
    <!-- App container -->
    <main>
      <!-- Top content -->
      @include('includes.navbar')
      @include('includes.messages')
      <!-- Pages content -->
      @yield('content')
    </main>
    <footer>&copy; {{ date('Y') }} @lang('Group Blog App')</footer>
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
