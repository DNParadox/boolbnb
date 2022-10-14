@extends('layouts.URAdashboard')
@section('content')

  

  <div class="container mb-5">  
    @if($show_updated_message == 'yes')
      <div class="alert alert-success" role="alert">
        Appartamento modificato con successo !
      </div>
    @endif
    @if ($have_one)
      <h1>Visualizza nel dettaglio il tuo appartamento</h1>
      <div class="apartment-container">
        <div class="apartment">
        
          <img class="w-50" src="{{ asset( 'storage/' . $apartments->photo) }}" alt="{{$apartments->title}}" alt="nome appartamento">
          
          <div class="right-part">


            {{-- Title --}}
            <h2 class="mt-4">{{$apartments->title}}</h2>

            {{-- Indirizzo --}}
            <div>    
              {{$apartments->address}}
            </div>
      
            {{-- Description --}}
            <p>{{$apartments->description}}</p>

            <div class="services">
              <h5>Informazioni appartamento:</h5>
              <div>
                <span>Numero di stanze {{$apartments->room_number}} | </span>
                <span>Numero letti {{$apartments->room_number}} | </span>
                <span>Numero bagni {{$apartments->room_number}} | </span>
                <span>Metri quadri {{$apartments->room_number}}</span>
              </div> 
            </div>

            {{-- Services --}}
            <div class="services">
              <h5>Servizi offerti: </h5>
              @foreach ($apartments->service as $service)
                @if ($loop->last)
                  <span>{{$service->name}}</span>
                @else
                  <span>{{$service->name}} - </span>  
                @endif   
              @endforeach              
            </div>

            {{-- Price --}}
            <h4>80 € a notte</h4>

        

          </div>

        </div>

        <div class="info">
          <a href="{{ route('logged.message') }}" class="btn ms-btn">Vedi Messaggi</a>
          <a href="{{ route('logged.apartments.edit',['apartment' => $apartments->id]) }}" class="btn ms-btn">Modifica</a>
            
    
          <form class="d-inline" action="{{ route('logged.apartments.destroy',['apartment' => $apartments->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <input class="btn ms-btn " onClick="return confirm('Sei sicuro di voler cancellare?');" type="submit" value="Elimina">
          </form>

          
        </div>


        <div class="container">
          <canvas id="myChart"></canvas>
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


    

 <script>

 </script>




<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 

 


 
