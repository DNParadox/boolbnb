<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Document</title>
      <!-- Styles -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <header class="ura_header">
    <nav class="nav_menu">
      {{-- Nav Logo --}}
      <div class="image_header">
        <figure class="logosize">
          {{-- Testing --}}
          <a href="{{ route( 'logged.apartments.index') }}">
            <img src="{{ asset('storage/' . 'airbnb.png') }}" alt="BoolBnB">
          </a>
        </figure>
       {{-- href="{{ route('register') --}}
      </div>
      {{-- Nav Center --}}
      <ul class="ul_links">
        <li class="links">
          <a href="{{ route( 'logged.apartments.index') }}"> Oggi </a>
        </li>
        <li class="links">
          <a href="#">Sponsorizza</a> 
        </li>
        <li class="links">
          <a href="#">Statistiche</a>
        </li>
        <li class="links">
          <div class="pr1 dropdown-btn" href="#">Menu <i class="fa-solid fa-chevron-down icon"></i></div>
          <ul class="dropdown-container tr1">
            <li class="nav-item"> 
              <a class="nav-link" href="{{ route( 'logged.apartments.create') }}" >
                Aggiungi un Appartamento
              </a>
            </li>
          </ul>
        </li>
      </ul>


      {{-- Nav right side Profile --}}
      <div class="profile_header">

        {{-- Area in testing --}}
        
        <div class="icon-container pr2 dropdown-btn"> <i class="fa-solid fa-user icon"></i></div>
        <ul class="dropdown-container tr">
          <li class="nav-item"> 
            <a class="nav-link" href="#">
              Messaggi
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
            Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        </ul>
      </div>


      {{-- Area Testing --}}
    </nav>
  </header>

  <main role="main">
    <div class="register mb-4">
      <div class="container">
        <div class="text">
          @if ($have_one)
            <h1>Inserisci il tuo appartamento nella sezione in Evidenza</h1>
          @else
            <h1>Apri le porte ai viaggiatori</h1>
          @endif
        </div>
    
        @if ($have_one)
          <div class="r-button">
            <a class="btn btn-success" href="#">Sponsorizza</a>
          </div>
        @else
          <div class="r-button">
            <a class="btn btn-primary" href="{{route('logged.apartments.create')}}">registra il tuo appartamento</a>
          </div>
        @endif
      </div>
    </div>
      @yield('content')
  </main>

  <script src="{{ asset('js/back.js') }}" defer></script>
</body>
</html>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;
for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>