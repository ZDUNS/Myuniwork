@extends('navbar.app')
@section('title', 'Ceļojumu iedvesmas foto')
@section('content')
<section id="music">
    <div class="music container">
    <div>
    <h1>Smelies ceļojumu iedvesmu</h1>
  </div>
    </div>
</section>
<section id="sideByside">
    <div class="row">
      <div class="column">
    <img src="/img/1view.jpg"  width="500" height="350">
        <p>Tira, Gireķija</p>
      </div>
      <div class="column">
        <img src="/img/2.view.jpg"  width="500" height="350">
        <p>Milforda fjords, Jaunzēlande</p>
      </div>
      <div class="column">
      <img src="/img/3.view.jpg"  width="500" height="350">
        <p>Maču Pikču, Peru</p>
      </div>
     
      <div class="column">
        <img src="/img/4.view.jpg"  width="500" height="350">
        <p>Lielais Ķīnas mūris</p>
      </div>
      <div class="column">
        <img src="/img/5.view.webp"  width="500" height="350">
        <p>Kolizejs, Itālija</p>
      </div>
      <div class="column">
        <img src="/img/6.view.jpg"  width="500" height="350">
        <p>Eifeļa tornis, Francija</p>
      </div>
      <div class="column">
        <img src="/img/7.view.webp"  width="500" height="350">
        <p>Capri sala, Itālija</p>
      </div> 
      <div class="column">
        <img src="/img/9.view.jpg" width="500" height="350">
        <p>Keukenhofas tulpju dārzs, Nīderlande</p>
      </div>
    </div>
    </section>
    @endsection