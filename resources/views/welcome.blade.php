@extends('navbar.app')
@section('title', 'Sveicināti ceļabiedru meklēšanas vietnē!')
@section('about_text', 'Par mums')
@section('AboutUs', '/AboutUs')
@section('logout_text', 'Iziet')
@section('logout', '/logout')
@section('content')
<div class="main">
<section id="Music-in-lifeSection">
    <h2>Mūsu dzīve ir ceļojums</h2>
    <p id="MusicTEXT">Tikai izkāpjot no saviem paradumiem, no ērtās un sakārtotās ikdienas, paklausot šai atavistiskajai – jeb varbūt ļoti racionālajai dziņai – doties ceļojumā un līdz ar to mesties kādā piedzīvojumā, var dzīvei dot vajadzīgo ritma maiņu.<br>Nebaidies doties ceļojumā, atrodi savus ceļabiedrus un meties neaizmirstamā piedzīvojumā!<br></p>
    </section>
    <footer>
        <div class="footer-icons">
            <a href="https://www.facebook.com/liene.reca/" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="https://www.instagram.com/_liene_r/" target="_blank"><i class="fa fa-instagram"></i></a>
            <a href="https://www.artstation.com/user-451266" target="_blank"><i class="fab fa-artstation"></i></a>
        </div>
    </footer>
    <script src="welcome.js"></script>
</div>
@endsection
