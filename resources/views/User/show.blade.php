@extends('navbar.app')
@section('title', 'Mana informācija')
@section('content')
    <div class="main">
        <h1 class="m-0">{{Auth::user()->username }}</h1>
        <a href="{{ route('User.edit', $users->id) }}"><i class="fas fa-pencil-alt"></i></a>
        <form action="{{ route('User.delete', $users->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit"
                onclick="return confirm('Vai tiešām vēlies dzēst savu profilu?');"
                class="border-0">
                <i class="fas fa-trash text-danger"></i>
            </button>
        </form>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    </div class="card">
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{Auth::user()->id }}</td>
                                </tr>
                                <tr>
                                    <td>Lietotāja vārds</td>
                                    <td>{{Auth::user()->username }}</td>
                                </tr>
                                <td>E-pasta adrese</td>
                                <td>{{Auth::user()->email }}</td>
                                </tr>
                                <td>Vārds</td>
                                <td>{{Auth::user()->firstName }}</td>
                                </tr>
                                <td>Uzvārds</td>
                                <td>{{Auth::user()->lastName }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
    @endsection
