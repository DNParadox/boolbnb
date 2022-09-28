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

  <div class="message_page">
    <div class="apartment_col">
      <img class="w-50" src="https://a0.muscache.com/im/pictures/miso/Hosting-631564783833927857/original/42232fae-ee5a-40c9-b24b-24571763df7b.jpeg?im_w=1200" alt="nome appartamento">
    </div>
    <div class="message_col">
      @foreach ($messages as $message)
        <h1>{{ $message->name }}</h1>
      @endforeach
    </div>
  </div>

 
@endsection