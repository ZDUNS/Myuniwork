@extends('navbar.app')
@section('title', 'Mana informācija')
@section('content')
    <div class="col-sm-6 d-flex">
        <h1 class="m-0">{{ $users->username }}</h1>
        <a href="{{ route('User.edit', $users->id) }}"><i class="fas fa-pencil-alt"></i></a>
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
                                    <td>{{ $users->id }}</td>
                                </tr>
                                <tr>
                                    <td>Lietotāja vārds</td>
                                    <td>{{ $users->username }}</td>
                                </tr>
                                <td>E-pasta adrese</td>
                                <td>{{ $users->email }}</td>
                                </tr>
                                <td>Vārds</td>
                                <td>{{ $users->firstName }}</td>
                                </tr>
                                <td>Uzvārds</td>
                                <td>{{ $users->lastName }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endsection
