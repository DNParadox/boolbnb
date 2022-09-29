@extends('layouts.URAdashboard')

@section('content')
<div class="register">
  <div class="container">
    <div class="text">
      <h1>Apri le porte ai viaggiatori</h1>
    </div>

    <div class="r-button">
      <a class="btn btn-primary" href="{{route('logged.apartments.create')}}">registra il tuo appartamento</a>
    </div>
  </div>
</div>

<section>
  <div>
    <h1>Aggiungi un Appartamento</h1>
  </div>

  <div class="row container content-form-apt">
    <form id="create-apartment" action="{{ route('logged.apartments.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      @method('POST')

      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

      <div class="row">
        {{-- Column Left --}}
        <div class="col col-left">
          <div class="mb-3">
            <label for="title" class="form-label">Nome <span class="required-check">*</span></label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required="required">
          </div>
  
          <div class="mb-3">
            <label for="address" class="form-label">Indirizzo <span class="required-check">*</span></label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required="required">
          </div>
  
          <div class="row">
            <div class="col mb-3">
              <label for="bathroom" class="form-label">Numero di bagni <span class="required-check">*</span></label>
              <input type="number" class="form-control" id="bathroom" name="bathroom" value="{{ old('bathroom') }}" required="required">
            </div>
      
            <div class="col mb-3">
              <label for="bed_number" class="form-label">Numero di letti <span class="required-check">*</span></label>
              <input type="number" class="form-control" id="bed_number" name="bed_number" value="{{ old('bed_number') }}" required="required">
            </div>
      
            <div class="col mb-3">
              <label for="room_number" class="form-label">Numero di camere <span class="required-check">*</span></label>
              <input type="number" class="form-control" id="room_number" name="room_number" value="{{ old('room_number') }}" required="required">
            </div>
          </div>
  
          <div class="row">
            <div class="col mb-3">
              <label for="square_meters" class="form-label">Metri quadrati <span class="required-check">*</span></label>
              <input type="numer" class="form-control" id="square_meters" name="square_meters" value="{{ old('square_meters') }}" required="required">
            </div>
          
    
            <div class="col mb-3">
              <label for="price" class="form-label">Prezzo</label>
              <input type="number"  class="form-control" id="price" name="price" min="0" value="0" step="0.001" value="{{ old('price') }}">
            </div>
          </div>
        </div>

        {{-- Column right --}} 
        <div class="col">
          <div class="mb3 pb-2">
            <div class="form-label">Servizi:</div>

            @foreach($services as $service) 

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="{{ $service->id }}" id="service-{{ $service->id }}" name="services[]">
                    <label class="form-check-label" for="service-{{ $service->id }}">
                    {{ $service->name }}
                    </label>
                </div>

            @endforeach
          </div>

          <div class="mb-3">
              <label for="description" class="form-label">Descrizione</label>
              <textarea class="form-control" id="description" name="description" rows="6">{{ old('description') }}</textarea>
          </div>

          <div class="media-upload mb-3">
            <label for="photo" class="form-label">Aggiungi un immagine <span class="required-check">*</span></label>
            <input class="form-control" type="file" id="photo" name="photo" required="required">
          </div>
         
        </div> 

      </div> 

      <hr>

      <div class="required-check-text">
        <span class="required-check">*</span> Campi obbligatori
      </div>
      
      <div class="btn-content">
        <input class="btn btn-apt btn-primary" type="submit" value="Aggiungi Appartamento">
      </div>

    </form>
    
  </div>

  <script type="text/javascript">

    document.getElementById('city').addEventListener('input',
      function(e) {

        const data = Object.fromEntries(new FormData(document.getElementById('create-apartment')).entries());

        console.log(data);

        form = document.getElementById('create-apartment');

        axios.get(`https://api.tomtom.com/search/2/geocode/${data.city}-${data.address}-${data.cap}.json?key=lktzYJVNxK8wkz5eqXTI2g6PVqM9Gcmq`)
        .then((response)=>{
          console.log(response.data.results[0].position.lat)

          form.innerHTML += `<input type="hidden" id="latitude" name="latitude" value="${response.data.results[0].position.lat}"> <input type="hidden" id="longitude" name="longitude" value="${response.data.results[0].position.lon}">`
        })
    })
    
  </script>

@endsection
