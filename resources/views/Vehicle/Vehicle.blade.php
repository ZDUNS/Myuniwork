@extends('navbar.app')
@section('title', 'Visi ceļojumu veidi')
@section('about_text', 'Par mums')
@section('AboutUs', '/AboutUs')
@section('logout_text', 'Iziet')
@section('logout', '/logout')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="main">
                <!-- Ja ceļojuma veidi netiek atrasti, jeb tabula ir tukša, izvada tekstu, ja tiek atrasti, tie tiek izvadīti lietotājam -->
                <thead>
                    @if ($vehicles->isEmpty())
                        <p>Šobrīd nav pieejams neviens ceļojuma veids!</p>
                    @else
                        <p>Pieejamie ceļojumu veidi!</p>
                        @foreach ($vehicles as $vehicles)
                            <table>
                                <tr>
                                    <th>Ceļojuma veids</th>
                                    <th>Apskatīt ceļojuma veidu</th>
                                    <!-- F-jas rediģēt un dzēst ir tikai administratoram, tāpēc pārbaudām, vai lietotājs ir administrators-->
                                    @if (!Auth::guest() && Auth::user()->isAdmin())
                                        <th>Rediģet ceļojuma veidu</th>
                                        <th>Dzest ceļojuma veidu</th>
                                    @endif
                                </tr>
                                <tr>
                                    <td>{{ $vehicles->name }}</td>
                                    <td><a href="{{ route('Vehicle.show', $vehicles->id) }}"><i
                                                class="far fa-eye"></i></a></a>
                                    </td>
                                    @if (!Auth::guest() && Auth::user()->isAdmin())
                                        <td><a href="{{ route('Vehicle.edit', $vehicles->id) }}" class="text success"><i
                                                    class="fas fa-pencil-alt"></i></a></td>
                                        </td>
                                        <td>
                                            <form action="{{ route('Vehicle.delete', $vehicles->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Vai tiešām vēlies dzēst šo ceļojuma veidu?');"
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
    </section>
@endsection
