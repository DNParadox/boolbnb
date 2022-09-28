@extends('layouts.URAdashboard')

@section('content')
  <h1>Aggiungi un Post</h1>
    
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

      <div class="mb-3">
          <label for="title" class="form-label">Nome</label>
          <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Indirizzo</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
      </div>

      <div class="mb-3">
        <label for="cap" class="form-label">CAP</label>
        <input type="number" class="form-control" id="cap" name="cap" value="{{ old('cap') }}">
      </div>

      <div class="mb-3">
        <label for="city" class="form-label">Citta</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
      </div>

      <div class="mb-3">
        <label for="bathroom" class="form-label">Numero di bagni</label>
        <input type="number" class="form-control" id="bathroom" name="bathroom" value="{{ old('bathroom') }}">
      </div>

      <div class="mb-3">
        <label for="bed_number" class="form-label">Numero di letti</label>
        <input type="number" class="form-control" id="bed_number" name="bed_number" value="{{ old('bed_number') }}">
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="number"  class="form-control" id="price" name="price" min="0" value="0" step="0.001" value="{{ old('price') }}">
      </div>

      <div class="mb-3">
        <label for="room_number" class="form-label">Numero di camere</label>
        <input type="number" class="form-control" id="room_number" name="room_number" value="{{ old('room_number') }}">
      </div>

      <div class="mb-3">
        <label for="square_meters" class="form-label">Metri quadrati</label>
        <input type="numer" class="form-control" id="square_meters" name="square_meters" value="{{ old('square_meters') }}">
      </div>

      <div class="mb3">
          <h3>Services:</h3>

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
          <textarea class="form-control" id="description" name="description" rows="5">{{ old('content') }}</textarea>
      </div>

      {{-- <div class="mb-3">
        <label for="photo" class="form-label">Default file input example</label>
        <input class="form-control" type="file" id="photo" name="photo">
      </div> --}}

      <input type="submit" value="Salva Post">          
  </form>
@endsection
