@extends('navbar.app')
@section('title', 'Diskusijas rediģēšana')
@section('content')
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="main">
                <header>Diskusijas rediģēšana</header>
                <form action="{{ route('Posts.update',  $posts->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="field">
                      <input type="text" name="title" placeholder="   Diskusijas nosaukums" value="{{ $posts->title }}">
                    </div>
                    <span class="text-danger">@error('title'){{$message}} @enderror</span>
                    <div class="form-group">
                      <label>Izvēlieties ceļojuma galamērķi</label>
                      <select name="place_id" class="form-control">
                        @foreach($places as $places)
                        <option value="{{ $places->id }}" 
                          {{ $places->id == $posts->place_id ? 'selected': ''}}
                          >{{ $places->name }}</option>
                        @endforeach
                    <div class="form-group">
                      <textarea id="summernote" name="description" placeholder="Diskusijas saturs">{{ $posts->description }}</textarea>
                    </div>
                    <span class="text-danger">@error('description'){{$message}} @enderror</span>
                    <div class="form-group">
                      <label for="exampleInputFile">Pievienojiet pirmskata attēlu</label>
                        <img src="{{ asset('storage/'. $posts->preview_image) }}" alt="preview_image" class="foredit">
                      </div>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="preview_image">
                        </div>
                    <div class="form-group">
                      <label for="exampleInputFile">Pievienojiet galveno attēlu</label>
                        <img src="{{ asset('storage/'. $posts->image) }}" alt="image" class="foredit">
                        <div class="input-group">
                            <input type="file" class="custom-file-input" name="image">
                          </div>
                        <div class="form-group">
                        <label>Izvēlieties ceļojuma veidu</label>
                        <select name="vehicle_id" class="form-control">
                          @foreach($vehicle as $vehicles)
                          <option value="{{ $vehicles->id }}" 
                            {{ $vehicles->id == $posts->vehicle_id ? 'selected': ''}}
                            >{{ $vehicles->name }}</option>
                          @endforeach
              </div>
            <div class="input-group-append">
            </div>
          </div>
                    <div class="form-group">
                      <input type="submit" value="Rediģēt" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
  </section>
  @endsection