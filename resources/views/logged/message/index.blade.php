@extends('layouts.URAdashboard')

@section('content')
  <div class="register">
    <div class="container">
      <div class="text">
        <h1>Apri le porte ai viaggiatori</h1>
      </div>

      <div class="r-button">
        <a class="btn btn-primary" href="{{route('logged.apartments.create')}}"> registra il tuo appartamento </a>
      </div>
    </div>
  </div>
@if ($have_one)
   <div class="message_page_header">
    <h2>Controlla i messaggi degli utenti</h2>
    <p>I clienti stannto aspettando una risposta riguardante il loro prossimo soggiorno</p>
  </div>

  <div class="message_page">
    <div class="apartment_col">
      <img src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" alt="nome appartamento">
    </div>
    <div class="message_col">
      <div>
        <h3>{{ $messages[0]->name }}</h3>
        <p>{{ $messages[0]->email }}</p>
        <p>{{ $messages[0]->message }}</p>
      </div>
    </div>
  </div>    
  @else
  <div class="message_page_header">
    <h2>Non hai appartamenti registrati</h2>
    <p>registrane uno per poter visualizzare i messaggi o contatta il servizio clienti</p>
  </div>
@endif
  
 
@endsection