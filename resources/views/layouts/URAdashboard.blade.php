<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

  <title>Document</title>
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <header class="ura_header">
    <nav class="nav_menu">
      {{-- Nav Image --}}
      <div class="image_header">
        <figure>
          <a href="#">
            <img src="{{ asset('/storage/' . 'airbnb.png') }}" alt="BoolBnB">
          </a>
        </figure>
       
      </div>
      <ul class="ul_links">
        <li>
          <a href="#">Oggi</a>
        </li>
        <li>
          <a href="#">Sponsorizza</a> 
        </li>
        <li>
          <a href="#">Statistiche</a>
        </li>
        <li>
          <a href="#">Menu</a>
        </li>
      </ul>
      <div class="profile_header">
        
      </div>
    </nav>
  </header>
  <main role="main">
      @yield('content')
  </main>

  <script src="{{ asset('js/back.js') }}" defer></script>
</body>
</html>
