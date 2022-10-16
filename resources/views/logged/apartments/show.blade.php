@extends('layouts.URAdashboard')
@section('content')

  <div class="container mb-5">  
    @if($show_updated_message == 'yes')
      <div class="alert alert-success" role="alert">
        Appartamento modificato con successo !
      </div>
    @endif
    @if ($have_one)
      <h2>{{$apartments->title}}</h2>
      <div class="address mb-2">{{$apartments->address}}</div>
      <div class="apartment-container">
        <div class="apartment">
          <div class="col-apartment">
            <img src="{{ asset( 'storage/' . $apartments->photo) }}" alt="{{$apartments->title}}" alt="nome appartamento">
          </div>      
        </div>
        <div class="detail-show">
          <div class="detail-apartment">
            <div><h3>Le info del tuo appartamento:</h3><span class="info">16 Ospiti · {{$apartments->bed_number}} Camere da letto · {{$apartments->bathroom}} Bagni · {{$apartments->room_number}} Camere</span></div>
            <hr>
            <h3>La descrizione:</h3>
            {{$apartments->description}}
            <hr>
            <h3>Servizi che offri:</h3>
            <div class="services-col">
              @foreach ($apartments->service as $service)
                <div class="service-ss"><i class="{{$service->icon}}"></i> {{$service->name}}</div>
              @endforeach 
            </div>
            <hr>
            @if($sponsorship)
               <h3>La tua attuale Sponsorizzazione</h3>
                <span>Tipo:  {{ $sponsorship->name }}</span> 
                <div><span>Durata sponsorizzazione:  {{ $sponsorship->hour }} Ore</span> · <span>Prezzo sponsorizzazione:  {{ $sponsorship->price }} &euro;</span></div>
              
            @else
              <h3>Non hai annora sponsorizzato il tuo appartamento</h3>
              <p>considera questa opzione per aumentare i tuoi guadagni e per altre funzioni aggiuntive</p>
            @endif
          </div>
          <div class="CTA-apartment">
            <div class="CTA-fake-form">
              <ul>                
                <li><form action="{{ route('logged.apartments.destroy',['apartment' => $apartments->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <i class="fa-solid fa-cancel mr-1"></i><input onClick="return confirm('Sei sicuro di voler cancellare?');" type="submit" value="Elimina" class="remove-btn">
                </form></li>
                <li><a href="{{ route('logged.sponsorship',['apartment' => $apartments->id]) }}" ><i class="fa-solid fa-euro"></i> Sponsorizza</a></li>
                <li><a href="{{ route('logged.apartments.edit',['apartment' => $apartments->id]) }}" ><i class="fa-solid fa-gear"></i> Modifica</a></li>
                <li><a href="{{ route('logged.message')}}"><i class="fa-solid fa-message"></i> Vedi messaggi</a></li>
              </ul>
            </div>
          </div>
          
        </div>
        <hr>
        <div class="container mt-3">
          <h3 class="text-center">Statistiche dell'ultimo anno</h3>
          <canvas id="myChart"></canvas>
        </div> 
      </div>
       
    @else
      <div class="banner">
        <h2 class="text-center">Prova a ospitare su Bnb</h2>
        <p class="text-center">Unisciti a noi. Saremo al tuo fianco in ogni momento.</p>
      </div>
    @endif

  </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 

 


 
