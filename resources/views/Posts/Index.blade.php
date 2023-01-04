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
                  @foreach($posts as $posts)
                  <tr>
                    <td>{{ $posts->title }}</td>
                    <td><a href="{{ route('Posts.show', $posts->id) }}"><i class="far fa-eye"></i></a></td>
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
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @endforeach
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
  </section>
  @endsection