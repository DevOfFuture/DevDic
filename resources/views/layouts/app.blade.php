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
        <title>Devdic - @yield('title')</title>
    </head>
    <body>

        <div class="container">
            <nav class="navbar navbar-toggleable-md navbar-light bg-faded">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Navbar</a>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            </div>
        </nav>
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