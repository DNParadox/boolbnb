@extends('layouts.URAdashboard')

@section('content')
@if ($have_one)
  @if ($have_one_message)
    <div class="message_page_header">
      <h2>Controlla i messaggi degli utenti</h2>
      <p>I clienti stannto aspettando una risposta riguardante il loro prossimo soggiorno</p>
    </div>
    @foreach ($messages as $message)
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
    @endforeach   
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