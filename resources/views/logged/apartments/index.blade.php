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
        <div class="title-index">
          <h1>
            Il tuo appartamento
          </h1>
        </div>
        <div class="list-apartments">
          <div class="row d-flex flex-wrap align-items-center">
            <div class="col-md-6 card-apt p-0">
              <a href="{{ route('logged.apartments.show',['apartment' => $apartments->id]) }}"><div>
                <div class="img-apt">
                  <img src="{{ asset( 'storage/' . $apartments->photo) }}" alt="{{$apartments->title}}">
                  <h2 class="p-2">{{$apartments->title}}</h3>
                </div>
                <div class="px-3 pt-3">
                  <h3 class="d-none">{{$apartments->title}}</h3>
                  <div>{{$apartments->address}}</div>
                  @if ($has_sponsorship)
                    <div>
                      <strong>Sponsorizzazione: </strong>{{ $has_sponsorship->name }}
                    </div>   
                  @endif               
                  <hr>
                  <div class="opt-apt">
                    
                    <a href="{{ route('logged.apartments.edit',['apartment' => $apartments->id]) }}" class="btn ms-btn mb-3">Modifica</a>
                    <form class="d-inline-block" action="{{ route('logged.apartments.destroy',['apartment' => $apartments->id]) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <input class="btn ms-btn mb-3" onClick="return confirm('Sei sicuro di voler cancellare?');" type="submit" value="Elimina">
                    </form>
                  </div>
                </div>
              </div></a>

  
            </div>
            <div class="col-md-6">

              <div class="banner-message">
                <h3>
                  Presto potrai aggiungere altri appartamenti
                </h3>
              </div>
              {{-- <h3>{{$apartments->title}}</h3>  
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
                <a class="btn ms-btn mt-2" href="{{ route('logged.sponsorship',['apartment' => $apartments->id]) }}" class="btn btn-primary">Sponsorizza</a>
              </div> --}}
  
            </div>
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="no-house">
      <img class="_9ofhsl" style="object-fit: cover; object-position: center top; vertical-align: bottom;" aria-hidden="true" alt="Una donna sorridente mette un piatto d'uva su un bancone in una cucina a tema arancione." decoding="async" elementtiming="LCP-target" fetchpriority="low" loading="lazy" src="https://a0.muscache.com/im/pictures/28a23ac3-1626-486f-9069-e5121d2341b0.jpg?im_w=720" data-original-uri="https://a0.muscache.com/im/pictures/28a23ac3-1626-486f-9069-e5121d2341b0.jpg?im_w=720">
      <div class="text">
        <div>
            <h2>Prova a ospitare su Boolbnb</h2>
            <h4>Unisciti a noi. Saremo al tuo fianco <br> in ogni momento.</h4>
            <a href="{{ route('logged.apartments.create')}}" class="btn ms-btn">Iniziamo !</a>
        </div>
      </div>
    </div>
    @endif
  </section>

  <script>
  function scroll_left() {
    // let content = document.querySelector(".slider-no-house");
    // content.scrollLeft -= 90;
    alert('dadawdawda')
  },
  function scroll_right() {
    let content = document.querySelector(".slider-no-house");
    content.scrollLeft += 80;
  },
  </script>
    
@endsection