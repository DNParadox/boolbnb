@extends('layouts.URAdashboard')
@section('content')
  <div class="register">
    <div class="container">
      <div class="text">
        @if ($have_one)
          <h1>Inserisci il tuo appartamento nella sezione in Evidenza</h1>
        @else
          <h1>Apri le porte ai viaggiatori</h1>
        @endif
      </div>
  
      @if ($have_one)
        <div class="r-button">
          <a class="btn btn-success" href="#">Sponsorizza</a>
        </div>
      @else
        <div class="r-button">
          <a class="btn btn-primary" href="{{route('logged.apartments.create')}}">registra il tuo appartamento</a>
        </div>
      @endif
    </div>
  </div>

  <div class="container mb-5">


    {{-- @foreach ($apartments as $apartment)
    <div class="apartment-container">
      <div class="apartment">
      
        <img class="w-50" src="{{ $apartment->photo }}" alt="{{ $apartment->title }}">
        
        <div class="right-part">
          <h3>{{ $apartment->title }}</h3>
          <p>{{ $apartment->description }}</p>
          <h4>{{ $apartment->address }}</h4>
          <div>
            <span>{{ $apartment->room_number }} | </span>
            <span>{{ $apartment->bed_number }} | </span>
            <span>{{ $apartment->bathroom }} | </span>
            <span>{{ $apartment->square_meters }}</span>
          </div>
          @foreach ($services as $service)
            <div class="services">
              <h4>Servizi offerti: </h4>
              <span>{{$service}} | </span>
            </div>
          @endforeach
          <h4>{{ $apartment->price }}</h4>
          <div class="modification">
            <a class="btn btn-primary" href="#">Modifica</a>
          </div>
  
          <div class="delete">
            <a class="btn btn-danger" href="#">Cancella</a>
          </div>
        </div>

      </div>

      <div class="info">
        <a class="btn btn-warning" href="#">Vedi messaggi</a>
        <a class="btn btn-info" href="#">Statistiche</a>
        <a class="btn btn-danger" href="#">Disabilita</a>
      </div>

    </div>
    @endforeach --}}
    @if ($have_one)
    <h2 class="mt-4">I TUOI APPARTAMENTI</h2>
    <hr class="mb-5">
      <div class="apartment-container">
        <div class="apartment">
        
          <img class="w-50" src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" alt="nome appartamento">
          
          <div class="right-part">
            <h3>{{$apartments->title}}</h3>
            <p>{{$apartments->description}}</p>
            <h4>{{$apartments->address}}</h4>
            <div>
              <span>numero di stanze | </span>
              <span>numero letti | </span>
              <span>numero bagni | </span>
              <span>metri quadri</span>
            </div>
            <div class="services">
              <h4>Servizi offerti: </h4>
              <span>wi-fi | </span>
            </div>
            <h4>80 € a notte</h4>
            <div class="modification">
              <a class="btn btn-primary" href="#">Modifica</a>
            </div>
    
            <div class="delete">
              <a class="btn btn-danger" href="#">Cancella</a>
            </div>
          </div>

        </div>

        <div class="info">
          <a class="btn btn-warning" href="#">Vedi messaggi</a>
          <a class="btn btn-info" href="#">Statistiche</a>
          <a class="btn btn-danger" href="#">Disabilita</a>
        </div>
        <hr m-5>
      </div> 
    @else
      <div class="banner">
        <h2 class="text-center">Prova a ospitare su Bnb</h2>
        <p class="text-center">Unisciti a noi. Saremo al tuo fianco in ogni momento.</p>
      </div>
    @endif

    

  </div>
@endsection