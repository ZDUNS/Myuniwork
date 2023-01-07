@extends('navbar.app')
@section('title', 'Jauna ceļojuma galamērķa pievienošana')
@section('content')

    <body>
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
