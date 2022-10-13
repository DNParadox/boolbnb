@extends('layouts.URAdashboard')

@section('content')
@if ($have_one)
  @if ($have_one_message)
    <div class="message_page_header">
      <div class="container">
        <h2>Controlla i messaggi degli utenti</h2>
        <p>I clienti stannto aspettando una risposta riguardante il loro prossimo soggiorno</p>
      </div>
    </div>
    {{-- @foreach ($messages as $message)
      <div class="message_page">
        <div class="apartment_col">
          <img src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" alt="nome appartamento">
        </div>
        <div class="message_col">
          <div>
            <p>{{ $message->email }}</p>
            <p>{{ $message->message }}</p>
          </div>
        </div>
      </div>
    @endforeach  --}}  

    <div class="container">
      <div class="my-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col" class="table-mobile-style">Profilo</th>
              <th scope="col">Email</th>
              <th scope="col" class="table-mobile-style">Data</th>
              <th scope="col">Messaggio</th>
              <th scope="col">Rispondi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($messages as $message)
            <tr>
              <td class="table-mobile-style"><div class="profile_header"><div class="icon-container"> <i class="fa-solid fa-user icon"></i></div></div></td>
              <td>{{ $message->email }}</td>
              <td class="table-mobile-style">{{ $message->send_date }}</td>
              <td>{{ $message->message }}</td>
              <td><a class="btn-color-bb" role="button" href="mailto:{{ $message->email }}">Rispondi</a></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>



        
      </div>
    </div>



  @else
    <div class="message_page_header">
      <h2>Non hai messaggi</h2>
      <p>registrane uno per poter visualizzare i messaggi o contatta il servizio clienti</p>
    </div>  
  @endif
@else 
  <div class="message_page_header">
    <h2>Non hai appartamenti registrati</h2>
    <p>registrane uno per poter visualizzare i messaggi o contatta il servizio clienti</p>
  </div>
@endif

 
@endsection