@extends('navbar.app')
@section('title', 'Ceļojuma veida rediģēšana')
@section('content')
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-3">
                    Jauna ceļojuma rediģēšana
                </h2>
                <form action="{{ route('Vehicle.update',  $vehicles->id) }}" method="POST" class="w-25">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Ceļojuma veida nosaukums" value="{{ $vehicles->name }}">
                        <span class="text-danger">@error('name'){{$message}} @enderror</span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Rediģēt">
                </form>
            </div>
        </div>
  </section>
  @endsection