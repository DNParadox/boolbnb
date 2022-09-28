<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <div class="container mt-5 mb-5">
    <h1>IL TUO PROFILO</h1>

    <h2>i tuoi dati:</h2>
    <h3><strong>Nome:</strong> {{$user->name}}</h3>
    <h3><strong>cognome:</strong> {{$user->surname}}</h3>
    <h3><strong>email:</strong> {{$user->email}}</h3>

    <h2 class="mt-5">I TUOI APPARTAMENTI</h2>
    <hr class="mb-5">
    {{-- @foreach ($apartments as $apartment)
      <div class="apartment">
      
      <img class="w-50" src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" alt="{{ $apartment->title }}">
      
      <div class="right-part">
        <h3> {{ $apartment->title }}</h3>
        <p>{{ $apartment->description }}</p>
        <h4>{{ $apartment->address }}</h4>
        <div>
          <span>{{ $apartment->room_number }} | </span>
          <span>{{ $apartment->bed_number }} | </span>
          <span>{{ $apartment->bathroom }} | </span>
          <span>{{ $apartment->square_meters }}</span>
        </div>
        <h4>{{ $apartment->price }}</h4>
        <div class="info">
          <a class="btn btn-success" href="#">Sponsorizza</a>
          <a class="btn btn-warning" href="#">Vedi messaggi</a>
          <a class="btn btn-info" href="#">Statistiche</a>
          <a class="btn btn-danger" href="#">Disabilita</a>
        </div>
        <a class="btn btn-primary" href="#">Modifica</a>

        <div class="delete">
          <a class="btn btn-danger" href="#">Cancella</a>
        </div>
      </div>
      
    </div>
    @endforeach --}}

    <div class="apartment">
      
      <img class="w-50" src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" alt="nome appartamento">
      
      <div class="right-part">
        <h3>La Sorgente. Unique and hardly describable.</h3>
        <p>A picco sull’acqua, ACCESSIBILE SOLO A PIEDI O VIA LAGO, luogo più unico che raro, scala privata di accesso diretto a lago con pontile, boa a disposizione per ormeggiare la propria barca (o una presa a noleggio).</p>
        <h4>Pognana Lario, Lombardia, Italia</h4>
        <div>
          <span>numero di stanze | </span>
          <span>numero letti | </span>
          <span>numero bagni | </span>
          <span>metri quadri</span>
        </div>
        <h4>80 € a notte</h4>
        <div class="info">
          <a class="btn btn-success" href="#">Sponsorizza</a>
          <a class="btn btn-warning" href="#">Vedi messaggi</a>
          <a class="btn btn-info" href="#">Statistiche</a>
          <a class="btn btn-danger" href="#">Disabilita</a>
        </div>
        <a class="btn btn-primary" href="#">Modifica</a>

        <div class="delete">
          <a class="btn btn-danger" href="#">Cancella</a>
        </div>
      </div>

    </div>

    <a class="btn btn-primary mt-5" href="{{route('logged.apartments.create')}}">registra il tuo appartamento</a>
  </div>
</body>
</html>