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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

</head>
<body>
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container-fluid">

      <div class="row justify-content-center align-items-center">
        <div class="col-xl-11 d-flex align-items-center justify-content-between">
          <h1 class="logo"><a>Diskusijas rediģēšana</a></h1>
          <nav id="navbar" class="navbar">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Galvenais skats</a></li>
              <li><a class="nav-link scrollto" href="#about">Par mums</a></li>
              <li><a class="nav-link scrollto" href="#services">Pēdējie jaunumi</a></li>
              <li><a class="nav-link scrollto " href="#portfolio">Atsauksmes</a></li>
              <li><a class="nav-link scrollto" href="#team">Ceļojuma iedvesmas foto</a></li>
              <li><a class="nav-link  " href="blog.html">Ceļo droši</a></li>
              <li class="dropdown"><a href="#"><span>Ceļojumi</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="{{ url('Vehicle') }}">Visi ceļojumu veidi</a></li>
                  <li><a href="{{ url('Create') }}">Pievienot jaunu ceļojuma veidu</a></li>
                </ul>
              </li>
              <li class="dropdown"><a href="#"><span>Galamērķi</span> <i class="bi bi-chevron-down"></i></a>
                <ul>
                  <li><a href="{{ url('Places') }}">Visi Galamērķi</a></li>
                      <li><a href="{{ url('AddNewPlace') }}">Pievienot jaunu galamērķi</a></li>
                </ul>
                <li><a href="logout">Atslēgties</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
        </div>
      </div>
    </div>
  </header><!-- End Header -->
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="main">
                <header>Profila rediģēšana</header>
                <form action="{{ route('User.update',  $users->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="field">
                      <input type="text" placeholder="   Ievadiet lietotāja vārdu" name="username" value="{{ $users->username}}">
                    </div>
                    <span class="text-danger">@error('username'){{$message}} @enderror</span>
                    <div class="field">
                      <input type="text"  placeholder="   Ievadiet pilnu vārdu" name="firstName" value="{{  $users->firstName }}">
                    </div>
                    <span class="text-danger">@error('firstName'){{$message}} @enderror</span>
                    <div class="field">
                      <input type="text"  placeholder="   Ievadiet pilnu uzvārdu" name="lastName" value="{{ $users->lastName }}">
                    </div>
                    <span class="text-danger">@error('lastName'){{$message}} @enderror</span>
                    <div class="field">
                      <input type="text"  placeholder="   Ievadiet E-pasta adresi" name="email" value="{{  $users->email }}">
                    </div>
                  <span class="text-danger">@error('email'){{$message}} @enderror</span>
                    <div class="form-group">
                      <input type="submit" value="Rediģēt" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
  </section>