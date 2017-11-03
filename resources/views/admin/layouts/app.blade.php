<!Doctype html>
<html>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
   <style>
        .read{
            overflow: hidden;
            font-size: 16px !important;
            transition: all 0.3s;
            margin-bottom: 10px;
        }
        .read-less{
            height: 90px!important;
        }
   </style>
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
    
    <script>
        $('#readMore').click(function(){
            $('.read').toggleClass('read-less');
            if($(this).text()=='Show Less') $(this).text('Show More');
            else  $(this).text('Show Less');
        });
    </script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/jquery/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
</html>