<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pieslēgšanās</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container"></div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h4>Pieslēgšanās</h4>
            <form action="{{route('login-user')}}" method="post">
                @csrf
                @if(Session::has('success'))
                <div class="success-div">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="error-div">{{Session::get('fail')}}</div>
                @endif
                <div class="form-group">
                <label for="name">Lietotāja vārds</label>
                <input type="text" class="form-control" placeholder="Ievadiet lietotāja vārdu" name="name" value="{{ old('username') }}">
                <span class="text-danger">@error('username'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                <label for="password">Parole</label>
                <input type="password" class="form-control" placeholder="Ievadiet paroli" name="password" value="{{ old('password') }}">
                <span class="text-danger">@error('password'){{$message}} @enderror</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-block btn-primary" type="submit">Pieslēgties</button>
        </form>
        <div class="signup">Vēl nav profila?
        <a href="{{ url('registration') }}">Reģistrējieties jau tagad!</a>
    </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>