@extends('navbar.app')
@section('title', 'Ceļojuma veida rediģēšana')
@section('about_text', 'Par mums')
@section('AboutUs', '/AboutUs')
@section('logout_text', 'Iziet')
@section('logout', '/logout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="main">
                <div class="col-12">
                    <h2 class="mb-3">
                        Ceļojuma veida rediģēšana
                    </h2>
                    <form action="{{ route('Vehicle.update', $vehicles->id) }}" method="POST" class="w-25">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $vehicles->id }}">
                            <input type="text" class="form-control" name="name" placeholder="Ceļojuma veida nosaukums"
                                value="{{ $vehicles->name }}">
                        </div>
                        <span class="text-danger">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </span>
                        <input type="submit" class="btn btn-primary" value="Rediģēt">
                    </form>
                </div>
            </div>
    </section>
@endsection
