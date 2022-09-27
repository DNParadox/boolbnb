<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h2>i tuoi dati</h2>
  <h3>Nome: {{$user->name}}</h3>
  <h3>cognome: {{$user->surname}}</h3>
  <h3>email: {{$user->email}}</h3>

  <h2>i tuoi appartamenti</h2>
  <a href="{{route('logged.apartments.create')}}">registra il tuo appartamento</a>
</body>
</html>