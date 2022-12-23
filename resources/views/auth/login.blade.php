<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/registration.css">
    <title>Pieslēgšanās</title>
</head>
<body>
    <div class="container"></div>
    <div class="row">
        <!-- <div class="col-md-4 col-md-offset-4" style="margin-top:20px;"> -->
        <header>Pieslēgšanās</header>
            <form action="{{route('login-user')}}" method="post">
                @csrf
                @if(Session::has('success'))
                <div class="success-div">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="error-div">{{Session::get('fail')}}</div>
                @endif
                <div class="field space">
                <!-- <label for="name">Lietotāja vārds</label> -->
                <input type="text" class="form-control" placeholder="   Ievadiet lietotāja vārdu" name="username" value="{{ old('username') }}">
                </div>
                <span class="text-danger">@error('username'){{$message}} @enderror</span>
                <div class="field space">
                <!-- <label for="password">Parole</label> -->
                <input type="password" class="form-control" placeholder="   Ievadiet paroli" name="password" value="{{ old('password') }}">
                </div>
                <span class="text-danger">@error('password'){{$message}} @enderror</span>
                <div class="pass">
                    <a href="#">Aizmirsāt paroli?</a>
                </div>
                <div class="field">
                    <input type="submit" value="Pieslēgties">
                </div>
        </form>
        <div class="signup">Vēl nav profila?
        <a href="{{ url('registration') }}">Reģistrējieties jau tagad!</a>
    </div>
        </div>
    </div>
    <script type="text/javascript" src="app.js"></script>
</body>
</html>