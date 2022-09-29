@extends('layouts.URAdashboard')

@section('content')
  <h1>Modifica un Appartamento</h1>
<div class="row container content-form-apt">    
  <form action="{{ route('logged.apartments.update', ['apartment' => $apartment->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method("PUT")

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
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $apartment->title) }}" required="required">
          </div>
  
          <div class="mb-3">
            <label for="address" class="form-label">Indirizzo <span class="required-check">*</span></label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $apartment->address) }}" required="required">
            <datalist id="addresses"> 
            
            </datalist>
          </div>
  
          <div class="row">
            <div class="col mb-3">
              <label for="bathroom" class="form-label">Numero di bagni <span class="required-check">*</span></label>
              <input type="number" class="form-control" id="bathroom" name="bathroom" value="{{ old('bathroom', $apartment->bathroom) }}" required="required">
            </div>
      
            <div class="col mb-3">
              <label for="bed_number" class="form-label">Numero di letti <span class="required-check">*</span></label>
              <input type="number" class="form-control" id="bed_number" name="bed_number" value="{{ old('bed_number', $apartment->bed_number) }}" required="required">
            </div>
      
            <div class="col mb-3">
              <label for="room_number" class="form-label">Numero di camere <span class="required-check">*</span></label>
              <input type="number" class="form-control" id="room_number" name="room_number" value="{{ old('room_number') }}" required="required">
            </div>
          </div>
  
          <div class="row">
            <div class="col mb-3">
              <label for="square_meters" class="form-label">Metri quadrati <span class="required-check">*</span></label>
              <input type="numer" class="form-control" id="square_meters" name="square_meters" value="{{ old('square_meters', $apartment->square_meters) }}" required="required">
            </div>
          
    
            <div class="col mb-3">
              <label for="price" class="form-label">Prezzo</label>
              <input type="number" class="form-control" id="price" name="price" value="{{ $apartment->price }}">
            </div>
          </div>

          <div class="mb3 pb-2">
            <div class="form-label">Servizi:</div>

              @foreach($services as $service) 

                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="{{ $service->id }}" id="service-{{ $service->id }}" name="services[]" {{ $apartment->service->contains($service) ? 'checked' : '' }}>
                  <label class="form-check-label" for="service-{{ $service->id }}">
                    {{ $service->name }}
                  </label>
                </div>

              @endforeach
          </div>

        </div>

        {{-- Column right --}} 
        <div class="col">
          
          <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description" rows="6">{{ old('description') }}</textarea>
          </div>

          <div class="media-upload mb-3">
            <label for="photo" class="form-label">Modifica Foto</label>
            <input class="form-control" type="file" id="photo" name="photo">
  
              <div class="upgrade-photo">
                <div>Foto attuale:</div>
                <img style="width: 15rem" src="{{ asset( '/storage/' . $apartments->photo) }}" alt=" {{ $apartment->title }}">
              </div>
          </div>
         
        </div> 

      </div> 

      <hr>

      <div class="required-check-text">
        <span class="required-check">*</span> Campi obbligatori
      </div>
      
      <div class="btn-content">
        <input class="btn btn-apt btn-primary" type="submit" value="Modifica Appartamento">
      </div>
                
  </form>
</div>
@endsection