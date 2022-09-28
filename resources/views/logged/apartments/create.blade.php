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
  <div>
    <h1>Aggiungi un Appartamento</h1>
  </div>
    
  <div class="row container content-form-apt">
    <form action="{{ route('logged.apartments.store') }}" method="post" enctype="multipart/form-data">
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
            <label for="title" class="form-label">Nome</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
          </div>
  
          <div class="mb-3">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
          </div>
  
          <div class="row">
            <div class="col mb-3">
              <label for="cap" class="form-label">CAP</label>
              <input type="number" class="form-control" id="cap" name="cap" value="{{ old('cap') }}">
            </div>
      
            <div class="col mb-3">
              <label for="city" class="form-label">Citta</label>
              <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
            </div>
          </div>
  
          <div class="row">
            <div class="col mb-3">
              <label for="bathroom_number" class="form-label">Numero di bagni</label>
              <input type="number" class="form-control" id="bathroom_number" name="bathroom_number" value="{{ old('bathroom_number') }}">
            </div>
      
            <div class="col mb-3">
              <label for="bed_number" class="form-label">Numero di letti</label>
              <input type="number" class="form-control" id="bed_number" name="bed_number" value="{{ old('bed_number') }}">
            </div>
      
            <div class="col mb-3">
              <label for="room_number" class="form-label">Numero di camere</label>
              <input type="number" class="form-control" id="room_number" name="room_number" value="{{ old('room_number') }}">
            </div>
          </div>
  
          <div class="row">
            <div class="col mb-3">
              <label for="square_meters" class="form-label">Metri quadrati</label>
              <input type="numer" class="form-control" id="square_meters" name="square_meters" value="{{ old('square_meters') }}">
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
            <h4>Services:</h4>

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
              <label for="description" class="form-label">Contenuto</label>
              <textarea class="form-control" id="description" name="description" rows="6">{{ old('description') }}</textarea>
          </div>

          <div class="mb-3">
            <label for="photo" class="form-label">aggiungi un immagine</label>
            <input class="form-control" type="file" id="photo" name="photo">
          </div>

          
        </div> 

      </div> 
      
      <div class="btn-content">
        <input class="btn btn-apt btn-primary" type="submit" value="Aggiungi Appartamento">
      </div>
    </form>
    
  </div>
@endsection
