@extends('navbar.app')
@section('title', 'Visi ceļojumu veidi')
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
                        @foreach ($vehicles as $vehicles)
                            <tr>
                                <td>{{ $vehicles->name }}</td>
                                <td><a href="{{ route('Vehicle.show', $vehicles->id) }}"><i class="far fa-eye"></i></a></td>
                                @if (!Auth::guest() && Auth::user()->isAdmin())
                                    <td><a href="{{ route('Vehicle.edit', $vehicles->id) }}" class="text success"><i
                                                class="fas fa-pencil-alt"></i></a></td>
                                    <td>
                                        <form action="{{ route('Vehicle.delete', $vehicles->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Vai tiešām velies dzēst šo ceļojuma veidu?');"
                                                class="border-0">
                                                <i class="fas fa-trash text-danger"></i>
                                @endif
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
