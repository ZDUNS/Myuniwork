@extends('navbar.app')
@section('title', 'Jaunas diskusijas izveidošana')
@section('content')
    <div class="main1">
        <header>Pievienot jaunu diskusiju</header>
        <h1>Ceļojumu kalendārs</h1>
        <iframe src="https://calendar.google.com/calendar/embed?height=500&wkst=1&bgcolor=%23B39DDB&ctz=Europe%2FRiga&src=bGllbmVyZWNhNDhAZ21haWwuY29t&color=%23039BE5" style="border:solid 1px #777" width="500" height="500" frameborder="0" scrolling="no"></iframe>
        <form action="{{ route('Posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <input type="text" name="title" placeholder="   Diskusijas nosaukums" value="{{ old('title') }}">
            </div>
            <span class="text-danger">
                @error('title')
                    {{ $message }}
                @enderror
            </span>
            <div class="form-group">
                <label>Izvēlieties ceļojuma galamērķi</label>
                <div class="pass"></div>
                <select name="place_id" class="form-control">
                    @foreach ($places as $places)
                        <option value="{{ $places->id }}" {{ $places->id == old('place_id') ? 'selected' : '' }}>
                            {{ $places->name }}</option>
                    @endforeach
                    <div class="form-group">
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
                            <div class="form-group">
                                <label>Izvēlieties ceļojuma veidu</label>
                                <div class="pass"></div>
                                <select name="vehicle_id" class="form-control">
                                    @foreach ($vehicle as $vehicles)
                                        <option value="{{ $vehicles->id }}"
                                            {{ $vehicles->id == old('vehicle_id') ? 'selected' : '' }}>
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
