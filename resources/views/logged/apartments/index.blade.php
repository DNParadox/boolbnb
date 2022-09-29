@extends('layouts.URAdashboard')
@section('content')
  <div class="profile-banner">
    <div class="container d-flex justify-content-between">
      <div>
        <h2>Ciao</h2>
        {{$user->name}} {{$user->surname}}!
      </div>
      <div>
        <button>Sponsorizza</button>
      </div>
    </div>
  </div>
  <section>    
  @if ($have_one)
    <div class="container">

      <h2>
        I tuoi appartamenti
      </h2>
      
      <div class="list-apartments">
        <div class="row d-flex card-apt">
          <div class="col">
            <div class="img-apt">
              <img src="https://a0.muscache.com/im/pictures/miso/Hosting-49806039/original/8b83e14e-1263-404c-b1c1-308f8662cc49.jpeg" alt="apartamento 1">
            </div>

          </div>
          <div class="col">
            <h3>{{$apartments->title}}</h3>  
            <div>{{$apartments->address}}</div>
            <div><strong>Sponsorizzato:</strong>{{ $has_sponsorship }}</div>
            
            <div class="price-apt">
              30,00€
            </div>
            <div>
              <button class="btn btn-primary">Visualizza</button>
              <button class="btn btn-secondary">Modifica</button>
              <button class="btn btn-danger">Cancella</button>
            </div>

          </div>
        </div>

        {{-- <div class="list-apartments">
          <div class="row d-flex card-apt">
            <div class="col">
              <div class="img-apt">
                <img src="https://a0.muscache.com/im/pictures/miso/Hosting-49806039/original/8b83e14e-1263-404c-b1c1-308f8662cc49.jpeg" alt="apartamento 1">
              </div>
  
            </div>
            <div class="col">
              <h3>Titolo dell'appartamento</h3>  
              <div>Indirizzo dell'appartamento</div>
              <div><strong>Sponsorizzato:</strong> No</div>
              
              <div class="price-apt">
                30,00€
              </div>
              <div>
                <button class="btn btn-primary">Visualizza</button>
                <button class="btn btn-secondary">Modifica</button>
                <button class="btn btn-danger">Cancella</button>
              </div>
  
            </div>
          </div> --}}   
      </div>
    </div>
    @endif
  </section>


    
@endsection