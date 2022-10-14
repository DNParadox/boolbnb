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
      <h2>{{$apartments->title}}</h2>
      <div class="apartment-container">
        <div class="apartment">
          <div class="col-apartment">
            <img src="{{ asset( 'storage/' . $apartments->photo) }}" alt="{{$apartments->title}}" alt="nome appartamento">
          </div>      
        </div>
        <div class="container">
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
 

 


 
