@extends('navbar.app')
@section('title', 'Diskusijas')
@section('content')
  <div class="col-sm-6 d-flex">
  <h1 class="m-0">{{ $posts->title }}</h1>
  <a href="{{ route('Places.edit', $posts->id) }}"><i class="fas fa-pencil-alt"></i></a> 
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
                    <td>{{ $posts->id }}</td>
                  </tr>
                  <tr>
                    <td>Nosaukums</td>
                    <td>{{ $posts->title }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
  </section>
  @endsection