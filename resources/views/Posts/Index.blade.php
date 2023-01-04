@extends('navbar.app')
@section('title', 'Visas diskusijas')
@section('content')
  <section class="content">
    <div class="container-fluid">
        <div class="row">
            </div>
            <div class="col-12">
            </div class="card">
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  @if ($posts->isEmpty())
                  <p>Nava atrasta neviena diskusija ar šādiem parametriem</p>
                @else 
                  @foreach($posts as $posts)
                  <tr>
                    <td>{{ $posts->title }}</td>
                    <td><a href="{{ route('Posts.show', $posts->id) }}"><i class="far fa-eye"></i></a></td>
                    @if (Auth::user()->id===$posts ->id || Auth::user()->isAdmin())
                    <td><a href="{{ route('Posts.edit', $posts->id) }}" class="text success"><i class="fas fa-pencil-alt"></i></a></td>
                    <td>
                      <form action="{{ route('Posts.delete', $posts->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0">
                          <i class="fas fa-trash text-danger"></i>
                        </button>
                      </form>
                    </td>
                    @endif
                  </tr>
                  @endforeach
                  @endif
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
        </div>
        <form action="{{ route('Posts.Index') }} " method="GET">
        <select name="vehicle_id" class="form-control">
          <option value="">Visi</option>
          @foreach($vehicles as $vehicle)
          <option value="{{ $vehicle->id }}" 
            {{ $vehicle->id == $vehicle_id ? 'selected': ''}}
            >{{ $vehicle->name }}</option>
          @endforeach
        </select>

        <select name="place_id" class="form-control">
          <option value="">Visi</option>
          @foreach($places as $place)
          <option value="{{ $place->id }}" 
            {{ $place->id == $place_id ? 'selected': ''}}
            >{{ $place->name }}</option>
          @endforeach
        </select>
        <button type="submit">Meklēt</button>
        </form>
    </div>
  </section>
  @endsection