@extends('navbar.app')
@section('title', 'Diskusijas')
@section('content')
    <div class="col-sm-6 d-flex">
        <div class="main">
            <header>{{ $posts->title }}</header>
            <div class="form-group">
                <label>Ceļojuma galamērķis: <td>{{ $place->name }}</td></label>
                <textarea id="summernote" name="description" placeholder="Diskusijas saturs">{{ $posts->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Pirmskata attēls</label>
                <img src="{{ asset('storage/' . $posts->preview_image) }}" alt="preview_image" class="foredit">
            </div>
            <div class="form-group">
                <label for="exampleInputFile">Galvenais attēls</label>
                <img src="{{ asset('storage/' . $posts->image) }}" alt="image" class="foredit">
                <div class="form-group">
                    <label>Ceļojuma veids: <td>{{ $vehicle->name }}</td></label>
                    <label>Izveidoja: <td>{{ $user->username }}</td></label>
                </div>
                <label>Komentāri:</label>
                @foreach ($answers as $answer)
                    <p>{{ $answer->user->username }}
                    <div>{{ $answer->description }}</div>
                @endforeach
                <h4>Pievienot komentāru</h4>
                <form method="post" action="{{ route('Answer.store') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="description" class="form-control" />
                        <input type="hidden" name="post_id" value="{{ $posts->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" value="Pievienot komentāru" />
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
