@extends('navbar.app')
@section('title', 'Visi ceļojumu veidi')
@section('about_text', 'Par mums')
@section('AboutUs', '/AboutUs')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="main">
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
                                                <td><a href="{{ route('Vehicle.edit', $vehicles->id) }}"
                                                        class="text success"><i class="fas fa-pencil-alt"></i></a></td>
                                                </td>
                                                <td>
                                                    <form action="{{ route('Vehicle.delete', $vehicles->id) }}"
                                                        method="POST">
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
