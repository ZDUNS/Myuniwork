@extends('navbar.app')
@section('title', 'Mans profils')
@section('about_text', 'Par mums')
@section('AboutUs', '/AboutUs')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="main">
                <p>Mans Profils</p>
                <table>
                    <tr>
                        <th>Lietotāja vārds</th>
                        <th>Skatīt manu profilu</th>
                        <th>Rediģet pofilu</th>
                        <th>Dzēst profilu</th>
                    </tr>
                    <tr>
                        <td>{{ Auth::user()->username }}</td>
                        <td><a href="{{ route('User.show', Auth::user()->id) }}"><i class="far fa-eye"></i></a></td>
                            <td><a href="{{ route('User.edit', Auth::user()->id) }}" class="text success"><i
                                        class="fas fa-pencil-alt"></i></a></td>
                            <td>
                                <form action="{{ route('User.delete', Auth::user()->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Vai tiešām vēlies dzēst savu profilu?');" class="border-0">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </form>
                            </td>
                    <tr>
                    </tr>
                </table>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
