<!DOCTYPE html>
<html lang="en">

<head>
    <title>MusSep</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">MusSep</a>
            </div>
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li class=""><a href="#">Home</a></li>
                <li><a href="#">Separator</a></li>
                <li><a href="#">Mixer</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('register'))
                        <li><a href="{{route('register')}}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                    @endif

                    @if (Route::has('login'))
                        <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    @endif
 
                @endguest 
            </ul>
        </div>
    </nav>

   <main>
        @yield('content')
    </main>
</body>

</html>