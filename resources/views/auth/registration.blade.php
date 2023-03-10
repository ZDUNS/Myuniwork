<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/registration.css">
    <title>Autentifikācija</title>
</head>

<body>
    <div class="container"></div>
    <div class="row">
        <!-- Lietotāja reģistrācijas skats, kurā tiek padoti aizpildāmie atribūti un neveiksmes gadījumā padotas kļūdas -->
        <header>Reģistrācija</header>
        <form action="{{ route('register-user') }}" method="post">
            @csrf
            @if (Session::has('success'))
                <div class="success-div">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="error-div">{{ Session::get('fail') }}</div>
            @endif
            <div class="field space">
                <!-- <label for="name">Pilns vārds</label> -->
                <input type="text" class="form-control" placeholder="   Ievadiet pilnu vārdu" name="firstName"
                    value="{{ old('firstName') }}">
            </div>
            <span class="text-danger">
                @error('firstName')
                    {{ $message }}
                @enderror
            </span>
            <div class="field space">
                <!-- <label for="name">Pilns uzvārds</label> -->
                <input type="text" class="form-control" placeholder="   Ievadiet pilnu uzvārdu" name="lastName"
                    value="{{ old('lastName') }}">
            </div>
            <span class="text-danger">
                @error('lastName')
                    {{ $message }}
                @enderror
            </span>
            <div class="field space">
                <!-- <label for="name">Lietotāja vārds</label> -->
                <input type="text" class="form-control" placeholder="   Ievadiet lietotāja vārdu" name="username"
                    value="{{ old('username') }}">
            </div>
            <span class="text-danger">
                @error('username')
                    {{ $message }}
                @enderror
            </span>
            <div class="field space">
                <!-- <label for="email">E-pasta adrese</label> -->
                <input type="text" class="form-control" placeholder="   Ievadiet E-pasta adresi" name="email"
                    value="{{ old('email') }}">
            </div>
            <span class="text-danger">
                @error('email')
                    {{ $message }}
                @enderror
            </span>
            <div class="field space">
                <!-- <label for="password">Parole</label> -->
                <input type="password" class="form-control" placeholder="   Ievadiet paroli" name="password"
                    value="{{ old('password') }}">
            </div>
            <span class="text-danger">
                @error('password')
                    {{ $message }}
                @enderror
            </span>
            <div class="pass"></div>
            <div class="field">
                <input type="submit" value="Reģistrēties">
            </div>
        </form>
        <div class="signup">Jau esi reģistrējies?
            <a href="{{ url('login') }}">Pieslēdzies vietnei!</a>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="app.js"></script>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>

</html>
