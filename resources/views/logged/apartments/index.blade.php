@extends('layouts.URAdashboard')
@section('content')

<div class="container">
  @if ($show_deleted_message == 'yes')
  <div class="alert alert-danger" role="alert">
      Post cancellato correttamente
  </div>
@endif


@if($show_created_message == 'yes')
  <div class="alert alert-success" role="alert">
    Appartamento creato con successo !
  </div>
@endif
</div>

  @if ($have_one)
    <div class="container">
      <div class="pb-4">
        <h2>
          I tuoi appartamenti
        </h2>

        <div class="list-apartments">
          <div class="row d-flex card-apt">
            <div class="col">
              <div class="img-apt">
                {{-- <img src="https://a0.muscache.com/im/pictures/miso/Hosting-49806039/original/8b83e14e-1263-404c-b1c1-308f8662cc49.jpeg" alt="{{$apartments->title}}"> --}}
                <img src="{{ asset( 'storage/' . $apartments->photo) }}" alt="{{$apartments->title}}">
              </div>
  
            </div>
            <div class="col">
              <h3>{{$apartments->title}}</h3>  
              <div>{{$apartments->address}}</div>
              <div><strong>Sponsorizzato:</strong> {{ $has_sponsorship }}</div>
              <div>
                <a href="{{ route('logged.apartments.show',['apartment' => $apartments->id]) }}" class="btn ms-btn mt-4">Visualizza dettagli</a>
                <a href="{{ route('logged.apartments.edit',['apartment' => $apartments->id]) }}" class="btn ms-btn mt-4">Modifica</a>
                <form action="{{ route('logged.apartments.destroy',['apartment' => $apartments->id]) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <input class="btn ms-btn mt-2" onClick="return confirm('Sei sicuro di voler cancellare?');" type="submit" value="Elimina">
                </form>
                <a href="{{ route('logged.sponsorship',['apartment' => $apartments->id]) }}" class="btn btn-primary">Sponsorizza</a>
              </div>
  
            </div>
          </div>
        </div>
      </div>
    </div>
    @endif
  </section>


    
@endsection