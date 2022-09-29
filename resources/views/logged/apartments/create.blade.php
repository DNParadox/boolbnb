@extends('layouts.URAdashboard')

@section('content')
  <h1>Aggiungi un Appartamento</h1>
    
  <form action="{{ route('logged.apartments.store') }}"  method="post" enctype="multipart/form-data">
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
        <label for="city" class="form-label">Città</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
      </div>

      <div class="mb-3">
        <label for="bathroom_number" class="form-label">Numero di bagni</label>
        <input type="number" class="form-control" id="bathroom_number" name="bathroom_number" value="{{ old('bathroom_number') }}">
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
          <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
      </div>

      <div class="mb-3">
        <label for="photo" class="form-label">aggiungi un immagine</label>
        <input class="form-control" type="file" id="photo" name="photo">
      </div>

      <input type="submit" value="Salva Post">          
  </form>


  <script type="text/javascript">

    document.getElementById('city').addEventListener('input',
      function(e) {
        // e.preventDefault();
        const data = Object.fromEntries(new FormData(document.querySelector('form')).entries());

        // let lat = document.getElementById('latitude').value;
        // let lon = document.getElementById('longitude').value;

        form = document.querySelector('form');

        axios.get(`https://api.tomtom.com/search/2/geocode/${data.city}-${data.address}-${data.cap}.json?key=lktzYJVNxK8wkz5eqXTI2g6PVqM9Gcmq`)
        .then((response)=>{
          console.log(response.data.results[0].position.lat)

          form.innerHTML += `<input type="hidden" id="latitude" name="latitude" value="${response.data.results[0].position.lat}"> <input type="hidden" id="longitude" name="longitude" value="${response.data.results[0].position.lon}">`
        })

    

        // axios.post("{{ route('logged.apartments.store') }}", this.data,{
        //   headers: {
        //     'X-CSRF-TOKEN' : window.Laravel.csrfToken
        //   }
        // });

        // axios({
        //   method: 'post',
        //   url: "{{ route('logged.apartments.store') }}",
        //   data: {
        //     formData: data
        //   },
        //   headers: {
        //     'X-CSRF-TOKEN' : document.querySelector('meta[name=csrf-token]').content,
        //     'content-type': 'text/json'
        //   }
        // })
    })
    
  </script>
@endsection
