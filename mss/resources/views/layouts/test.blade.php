<!doctype html>
<html lang="en">

<head>
    <title>MusSep</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<header class="w-100">
    <nav class="navbar navbar-expand-sm">
        <a class="navbar-brand">
            <img src="/img/logo.png" class="w-100 h-100 mb-4" alt="">
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
            aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
        <!-- Navigation menu -->
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <!-- Left navigation -->
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <!-- Home -->
                <li class="nav-item active">
                    <a class="nav-link" href="">Home</a>
                </li>
                <!-- Separator -->
                <li class="nav-item">
                    <a class="nav-link" href="">Separator</a>
                </li>
                <!-- Mixer -->
                <li class="nav-item">
                    <a class="nav-link" href="">Mixer</a>
                </li>
            </ul>
            <!-- Right navigation -->
            <div>
                @guest
                @if (Route::has('login'))
                <!-- Login -->
                    <a href="{{route()}}">
                        <button class="header-button"> Login </button>
                    </a>
                    <!-- Register -->
                    <a href="./users_UI/login.php">
                        <button class="header-button"> Register </button>
                    </a>
                @endif
                @else
                    <!-- Already logged in  -->
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Hi, {{ Auth::user()->name }}!

                        </a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        <!-- Tuan Self code -->
                        <!-- <div class="user-option dropdown">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="./my_files.php">My Files</a></li>
                                    <li><a href="../utils/logout.php">Log Out</a></li>
                                </ul>
                            </div> -->
                        <!-- Laravel -->
                        <!-- <div class="user-option dropdown">
                                <button class="dropdown-toggle" type="button" data-toggle="dropdown">
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu"> 
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"> 

                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul> 
                            </div> -->
                    </div>
                @endguest
            </div>
        </div>
    </nav>
</header>

<body> 
    @yield('content')
</body> 
<footer> 
</footer>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

</html>