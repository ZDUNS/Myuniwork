@extends('navbar.app')
@section('title', 'Jauna ceļojuma galamērķa pievienošana')
@section('about_text', 'Par mums')
@section('AboutUs', '/AboutUs')
@section('logout_text', 'Iziet')
@section('logout', '/logout')
@section('content')
    <body>
        <!-- Ceļojuma galamērķa izveidošanas skats, kurā dati tiek saglabāti store funkcijā, neveiksmes gadījuma tiek ziņots par kļūdu -->
        <section class="content">
            <div class="container-fluid">
                <div class="main">
                    <div class="col-12">
                        <h2 class="mb-3">
                            Ievadiet ceļojuma galamērķa nosaukumu
                        </h2>
                        <form action="{{ route('Places.store') }}" method="POST" class="w-25">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Ceļojuma galamērķis">
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
