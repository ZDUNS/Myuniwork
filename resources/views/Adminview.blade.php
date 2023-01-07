@extends('navbar.app')
@section('title', 'Administratora visu datu skats')
@section('content')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">        
<div class="main">
    <div class="col-lg-3 col-6">
        <div class="box">
            <div class="inner">
            <p>Lietotāju skaits:</p>
            <h3>{{ $data['usersCount'] }}</h3>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="box">
                <div class="inner">
                <p>Diskusiju skaits:</p>
                <h3>{{ $data['postsCount'] }}</h3>
                </div>
            </div>
                <div class="col-lg-3 col-6">
                <div class="box">
                    <div class="inner">
                    <p>Galamērķu skaits:</p>
                    <h3>{{ $data['placesCount'] }}</h3>
                    </div>
        @endsection
