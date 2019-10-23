<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gestion Hotel</title>
    <link rel="stylesheet" href="{{URL::to('css/foundation.min.css')}}"/>
    <link rel="stylesheet" href="{{URL::to('css/style.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.1.1/motion-ui.min.css"/>
    @yield('styles')
  </head>
  <body>
    @include('includes.header')
    <br>
    @yield('content')
    <br>
    @include('includes.footer')
    <script src="{{URL::to('js/jquery.js')}}"></script>
    <script src="{{URL::to('js/what-input.js')}}"></script>
    <script src="{{URL::to('js/foundation.min.js')}}"></script>
    <script>
      $(document).foundation();
    </script>
    @yield('scripts')
  </body>
</html>