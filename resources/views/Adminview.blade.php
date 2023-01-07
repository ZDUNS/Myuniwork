@extends('navbar.app')
@section('title', 'Administratora visu datu skats')
@section('content')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <div class="main">
        <div class="col-lg-3 col-6">

            <p>Administratoram pieejamie dati</p>
            <table>
                <tr>
                    <th>Kopējais reģistrēto lietotāju skaits</th>
                    <th>Kopējais ceļojumu galamērķu skaits</th>
                    <th>Kopējais ceļojumu veidu skaits</th>
                    <th>Kopējais diskusiju skaits</th>
                </tr>
                <tr>
                    <td>{{ $data['usersCount'] }}</td>
                    <td>{{ $data['postsCount'] }}</td>
                    <td>{{ $data['placesCount'] }}</td>
                    <td>{{ $data['vehicleCount'] }}</td>
                <tr>
                </tr>
            </table>
        @endsection
