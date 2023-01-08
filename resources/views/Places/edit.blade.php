@extends('navbar.app')
@section('title', 'Ceļojuma galamērķu rediģēšana')
@section('about_text', 'Par mums')
@section('AboutUs', '/AboutUs')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="main">
                <div class="col-12">
                    <h2 class="mb-3">
                        Ceļojuma galamērķa rediģēšana
                    </h2>
                    <form action="{{ route('Places.update', $places->id) }}" method="POST" class="w-25">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <input type="hidden" name="id" value="{{ $places->id }}">
                            <input type="text" class="form-control" name="name" placeholder="Ceļojuma galamērķa nosaukums"
                                value="{{ $places->name }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Rediģēt">
                    </form>
                </div>
            </div>
    </section>
@endsection
