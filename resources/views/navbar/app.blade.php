<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="/css/postscreate.css">
    <script src="https://kit.fontawesome.com/177bb27b0f.js" crossorigin="anonymous"></script>
    <!-- Favicons -->
    <link href="/img/mt.-fuji-BLOG-mountains.png" rel="icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700"
        rel="stylesheet">

</head>
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid">

        <div class="row justify-content-center align-items-center">
            <div class="col-xl-11 d-flex align-items-center justify-content-between">
                <h1 class="logo"><a>@yield('title')</a></h1>
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto active" href="{{ url('welcome') }}">Galvenais skats</a></li>
                        <li><a class="nav-link scrollto" href="@yield('AboutUs')">@yield('about_text')</a></li>
                        @if (!Auth::guest() && Auth::user()->isAdmin())
                        <li><a class="nav-link scrollto " href="{{ url('Alldata') }}">Administratora skats</a></li>
                        @endif
                        <li><a class="nav-link scrollto" href="{{ url('gallery/welcome') }}">Ceļojuma iedvesmas foto</a></li>
                        <li><a class="nav-link  " href="{{ url('SafeTrip') }}">Ceļo droši</a></li>
                        <li class="dropdown"><a href="{{ url('Vehicle') }}"><span>Ceļojumu veidi</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                @if (!Auth::guest() && Auth::user()->isAdmin())
                                    <li><a href="{{ url('Create') }}">Pievienot jaunu ceļojuma veidu</a></li>
                                @endif
                            </ul>
                        </li>
                        <li class="dropdown"><a href="{{ url('Places') }}"><span>Ceļojumu galamērķi</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                @if (!Auth::guest() && Auth::user()->isAdmin())
                                    <li><a href="{{ url('AddNewPlace') }}">Pievienot jaunu galamērķi</a></li>
                                @endif
                            </ul>
                        </li>
                        <li class="dropdown"><a href="{{ url('Posts') }}"><span>Visas diskusijas</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ url('AddNewPost') }}">Pievienot jaunu diskusiju</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="{{ url('User') }}"><span>Mans profils</span> <i
                                    class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="logout">Iziet</a></li>
                            </ul>
                        </li>
                        <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->
            </div>
        </div>
    </div>
</header><!-- End Header -->
@yield('content')
