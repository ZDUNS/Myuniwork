@extends('navbar.app')
@section('title', 'Diskusijas')
@section('about_text', 'Par mums')
@section('AboutUs', '/AboutUs')
@section('content')
    <div class="col-sm-6 d-flex">
        <div class="main1">
            <fieldset>
                <legend>Diskusiju Izveidoja: <td>{{ $user->username }}</legend>
            <header>{{ $posts->title }}</header>
            <div class="form-group">
                <h1>Ceļojumu kalendārs</h1>
        <iframe src="https://calendar.google.com/calendar/embed?height=500&wkst=1&bgcolor=%23B39DDB&ctz=Europe%2FRiga&src=bGllbmVyZWNhNDhAZ21haWwuY29t&color=%23039BE5" style="border:solid 1px #777" width="500" height="500" frameborder="0" scrolling="no"></iframe>
                <br>
        <label>Ceļojuma galamērķis: <td>{{ $place->name }}</td></label>
        <br>
                <label>Diskusijas saturs: <h5>{{ $posts->description }}</h5></label>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Pirmskata attēls</label>
                <img src="{{ asset('storage/' . $posts->preview_image) }}" alt="preview_image" class="foredit">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Galvenais attēls</label>
                <img src="{{ asset('storage/' . $posts->image) }}" alt="image" class="foredit">
                <div class="form-group">
                    <br>
                    <label>Ceļojuma veids: <td>{{ $vehicle->name }}</td></label>
                </div>
                <label>Atbildes:</label>
                @if ($answers->isEmpty())
                <p>Nav atrasta neviena atbilde!</p>
                @else
                @foreach ($answers as $answer)
                    <p>{{ $answer->user->username }}
                    <div>{{ $answer->description }}</div>
                @endforeach
                @endif
                <br>
                <legend>Pievienot atbildi</legend>
                <br>
                <form method="post" action="{{ route('Answer.store') }}">
                    @csrf
                    <span class="text-danger">
                        @error('description')
                            {{ $message }}
                        @enderror
                    </span>
                    <div class="form-group">
                        <input type="text" name="description" class="form-control" />
                        <input type="hidden" name="post_id" value="{{ $posts->id }}" />
                    </div>
                    <br>
                    <div class="field1">
                        <input type="submit" class="btn btn-warning" value="Pievienot atbildi" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
