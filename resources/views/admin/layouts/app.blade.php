<!Doctype html>
<html>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            <sidebabr> sidebar </sidebabr>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>

    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/jquery/jquery-3.21.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
</html>