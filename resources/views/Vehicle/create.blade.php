@extends('navbar.app')
@section('title', 'Jauna ceļojumu veida izveidošana')
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
                        Jauna ceļojuma veida pievienošana
                    </h2>
                    <form action="{{ route('Vehicle.store') }}" method="POST" class="w-25">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Ceļojuma veida nosaukums">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Pievienot">
                    </form>
                </div>
            </div>
    </section>
@endsection
