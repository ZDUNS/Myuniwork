@extends('navbar.app')
@section('title', 'Jaunas diskusijas izveidošana')
@section('about_text', 'Par mums')
@section('AboutUs', '/AboutUs')
@section('content')
    <div class="main1">
        <fieldset>
        <legend>Pievienot jaunu diskusiju</legend>
        <h1>Ceļojumu kalendārs</h1>
        <iframe src="https://calendar.google.com/calendar/embed?height=500&wkst=1&bgcolor=%23B39DDB&ctz=Europe%2FRiga&src=bGllbmVyZWNhNDhAZ21haWwuY29t&color=%23039BE5" style="border:solid 1px #777" width="500" height="500" frameborder="0" scrolling="no"></iframe>
        <form action="{{ route('Posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <legend>Diskusijas dati</legend>
                <label for="input-one">Diskusijas nosaukums</label>
                <input type="text" name="title" id="input-one" value="{{ old('title') }}">
            <span class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </span>
            <div class="form-group">
                <label>Izvēlieties ceļojuma galamērķi</label>
                <br>
                <div class="pass"></div>
                <select name="place_id" class="form-control">
                    @foreach ($places as $places)
                        <option value="{{ $places->id }}" {{ $places->id == old('place_id') ? 'selected' : '' }}>
                            {{ $places->name }}</option>
                    @endforeach<div class="pass"></div>
                    <fieldset>
                        <label for="input-one">Diskusijas saturs</label>
                    <div class="form-group">
                            <label for="input-one">Ievadiet diskusijas nosaukumu</label>
                        <textarea id="summernote" name="description" placeholder="Diskusijas saturs">{{ old('description') }}</textarea>
                    </div>
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="form-group">
                        <label for="exampleInputFile">Pievienojiet pirmskata attēlu</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="preview_image">
                            </div>
                            <div class="input-group-append">
                            </div>
                            <span class="text-danger">
                                @error('preview_image')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Pievienojiet galveno attēlu</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image">
                            </div>
                            <span class="text-danger">
                                @error('image')
                                    {{ $message }}
                                @enderror
                            </span>
                            <div class="form-group">
                                <label>Izvēlieties ceļojuma veidu</label>
                                <br>
                                <div class="pass"></div>
                                <select name="vehicle_id" class="form-control">
                                    @foreach ($vehicle as $vehicles)
                                        <option value="{{ $vehicles->id }}"
                                            {{ $vehicles->id == old('vehicle_id') ? 'selected' : '' }}>
                                            {{ $vehicles->name }}</option>
                                    @endforeach
                                    <br>
                                    <div class="input-group-append">
                                    </div>
                            </div>
                            <span class="input-group-text">Pievienot</span>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="submit">
                <input type="submit" value="Pievienot diskusiju" class="btn btn-primary">
            </div>
        </form>
    </div>
    </div>
@endsection
