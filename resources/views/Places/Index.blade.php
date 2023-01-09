@extends('navbar.app')
@section('title', 'Ceļojumu galamērķi')
@section('about_text', 'Par mums')
@section('AboutUs', '/AboutUs')
@section('logout_text', 'Iziet')
@section('logout', '/logout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="main">
                <div class="col-12">
                </div class="card">
                <!-- Tiek parādīts saraksts ar visiem iespējamajiem galamērķiem, papildus administratoram tiek dotas konkrētas funkcijas, kuras tiek implementētas ar idAdmin palīdzību -->
                <div class="card-body table-responsive p-0">
                    <thead>
                        @if ($places->isEmpty())
                            <p>Šobrīd nav pieejams neviens ceļojuma galamērķis!</p>
                        @else
                            <p>Pieejamie ceļojumu galamērķi!</p>
                            @foreach ($places as $places)
                                <table>
                                    <tr>
                                        <th>Ceļojuma galamērķis</th>
                                        <th>Apskatīt ceļojuma galamērķi</th>
                                        @if (!Auth::guest() && Auth::user()->isAdmin())
                                        <th>Rediģet ceļojuma galamērķi</th>
                                        <th>Dzest ceļojuma galamērķi</th>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td>{{ $places->name }}</td>
                                        <td><a href="{{ route('Places.show', $places->id) }}"><i class="far fa-eye"></i></a>
                                        </td>
                                        @if (!Auth::guest() && Auth::user()->isAdmin())
                                            <td><a href="{{ route('Places.edit', $places->id) }}" class="text success"><i
                                                        class="fas fa-pencil-alt"></i></a></td>
                                            </td>
                                            <td>
                                                <form action="{{ route('Places.delete', $places->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        onclick="return confirm('Vai tiešām vēlies dzēst šo ceļojuma galamērķi?');"
                                                        class="border-0">
                                                        <i class="fas fa-trash text-danger"></i>
                                        @endif
                                        </button>
                                        </form>
                                        </td>
                                    <tr>
                            @endforeach
                            </tr>
                        @endif
                        </table>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
