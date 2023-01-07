@extends('navbar.app')
@section('title', 'Ceļojumu galamērķi')
@section('content')
    <div class="main">
        <h1 class="m-0">{{ $places->name }}</h1>
        <a href="{{ route('Places.edit', $places->id) }}"><i class="fas fa-pencil-alt"></i></a>
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
                                    <td>{{ $places->id }}</td>
                                </tr>
                                <tr>
                                    <td>Nosaukums</td>
                                    <td>{{ $places->name }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </div>
        </section>
    @endsection
