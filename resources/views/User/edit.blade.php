@extends('navbar.app')
@section('title', 'Profila rediģēšana')
@section('about_text', 'Par mums')
@section('AboutUs', '/AboutUs')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="main">
                    <header>Profila rediģēšana</header>
                    <form action="{{ route('User.update', $users->id) }}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $users->id }}">
                        @csrf
                        @method('PATCH')
                        <div class="field space">
                            <input type="text" placeholder="   Ievadiet lietotāja vārdu" name="username"
                                value="{{Auth::user()->username}}">
                            </div>
                        <span class="text-danger">
                            @error('username')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="field space">
                            <input type="text" placeholder="   Ievadiet pilnu vārdu" name="firstName"
                                value="{{Auth::user()->firstName }}">
                            </div>
                        <span class="text-danger">
                            @error('firstName')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="field space">
                            <input type="text" placeholder="   Ievadiet pilnu uzvārdu" name="lastName"
                                value="{{Auth::user()->lastName }}">
                            </div>
                        <span class="text-danger">
                            @error('lastName')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="field space">
                            <input type="text" placeholder="   Ievadiet E-pasta adresi" name="email"
                                value="{{Auth::user()->email }}">
                            </div>
                        <span class="text-danger">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>
                        <div class="form-group">
                            <input type="submit" value="Rediģēt" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
