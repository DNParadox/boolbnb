@extends('layouts.URAdashboard')
@section('content')

  <div class="container mb-5">

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
              <span>numero di stanze {{$apartments->room_number}} | </span>
              <span>numero letti {{$apartments->room_number}} | </span>
              <span>numero bagni {{$apartments->room_number}} | </span>
              <span>metri quadri {{$apartments->room_number}}</span>
            </div>
            <div class="services">
              <h4>Servizi offerti: </h4>
              @foreach ($apartments->service as $service)
                <span>{{$service->name}}</span>   
              @endforeach
               
              
            </div>
            <h4>80 € a notte</h4>
            <div class="modification">
              <a href="{{ route('logged.apartments.edit',['apartment' => $apartments->id]) }}" class="btn btn-primary">Modifica</a>
            </div>
    
            <div class="delete">
              <a class="btn btn-danger" href="#">Cancella</a>
            </div>
          </div>

        </div>

        <div class="info">
          <a href="{{ route('logged.message') }}" class="btn btn-primary">Vedi Messaggi</a>
          <a class="btn btn-info" href="#">Statistiche</a>
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