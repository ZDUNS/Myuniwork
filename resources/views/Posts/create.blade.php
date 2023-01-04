@extends('navbar.app')
@section('title', 'Jaunas diskusijas izveidošana')
@section('content')
    <div class="main">
          <header>Pievienot jaunu diskusiju</header>
          <form action="{{ route('Posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field">
              <input type="text" name="title" placeholder="   Diskusijas nosaukums" value="{{ old('title') }}">
            </div>
            <span class="text-danger">@error('title'){{$message}} @enderror</span>
            <div class="form-group">
              <label>Izvēlieties ceļojuma galamērķi</label>
              <div class="pass"></div>
              <select name="place_id" class="form-control">
                @foreach($places as $places)
                <option value="{{ $places->id }}"
                {{ $places->id == old('place_id')? 'selected': ''}}
                >{{ $places->name }}</option>
                @endforeach
            <div class="form-group">
              <textarea id="summernote" name="description" placeholder="Diskusijas saturs">{{ old('description') }}</textarea>
            </div>
            <span class="text-danger">@error('description'){{$message}} @enderror</span>
            <div class="form-group">
              <label for="exampleInputFile">Pievienojiet pirmskata attēlu</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="preview_image">
                  <label class="custom-file-label" for="exampleInputFile">Izvēlieties failu</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Pievienot</span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Pievienojiet galveno attēlu</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image">
                  <label class="custom-file-label" for="exampleInputFile">Izvēlieties failu</label>
                </div>
                <div class="form-group">
                <label>Izvēlieties ceļojuma veidu</label>
                <div class="pass"></div>
                <select name="vehicle_id" class="form-control">
                  @foreach($vehicle as $vehicles)
                  <option value="{{ $vehicles->id }}"
                    {{ $vehicles->id == old('vehicle_id')? 'selected': ''}}>
                    {{ $vehicles->name }}</option>
                  @endforeach
                <div class="input-group-append">
                </div>
              </div>
                  <span class="input-group-text">Pievienot</span>
        </div>
      </div>
    </div> 
            <div class="submit">
              <input type="submit" value="Pievienot diskusiju" class="btn btn-primary">
            </div>
          </form>
    </div>
      </div>
      @endsection