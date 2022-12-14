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
    <div class="container h-100">
      <nav class="nav_menu">
        <div class="row d-flex align-items-center h-100" >
          <div class="col d-md-flex">
            {{-- Nav Logo --}}
            <div class="image_header">
              <figure class="logosize">
                <a href="http://127.0.0.1:8000/">
                  <img src="{{ asset('storage/' . 'logo-boolbnb.png') }}" alt="BoolBnB">
                </a>
              </figure>
            </div>
          </div>
  
          {{-- Nav Center --}}
          <div class="col d-none  d-lg-flex">
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
          </div>
    
    
          {{-- Nav right side Profile --}}
          <div class="col d-flex justify-content-end">
            <div class="profile_header">
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
          </div>
      </nav>
    </div>
  </header>

  <main role="main">
    <div class="register mb-4">
      <div class="container">
        <div class="row d-flex align-items-center m-auto">
          <div class="col-md-6 text">
            @if ($have_one)
              <h2>Inserisci il tuo appartamento nella sezione in Evidenza</h2>
            @else
              <h2>Apri le porte ai viaggiatori</h2>
            @endif
          </div>
      
          <div class="col-md-6">
            @if ($have_one)
              <div class="r-button">
                <a class="btn sponsor-btn" href="#">Sponsorizza</a>
              </div>
            @else
              <div class="r-button">
                <a class="btn ms-btn" href="{{route('logged.apartments.create')}}">registra il tuo appartamento</a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
      @yield('content')
  </main>

  <footer class="text-center mt-5">
    <div class="footer-top pt-5 pb-5">
        <div class="container text-white d-flex flex-wrap align-items-center justify-content-between">
            <div class="logo-footer">
                <a class="navbar-brand" href="http://127.0.0.1:8000">
                    <img class="logo" src="{{ asset('storage/' . 'logo-boolbnb-white.png') }}" alt="Logo BoolBnb">
                </a>
            </div>
            <div class="contact-footer d-flex justify-content-around flex-wrap align-items-center">
                <p class="mr-3 mt-3">
                    <a class="text-white" href="https://github.com/andrea-mangiapia">
                        <i class="fab fa-github mr-2"></i>Andrea Mangiapia
                    </a>
                </p>
                <p class="mr-3 mt-3">
                    <a class="text-white" href="https://github.com/LorenzoVeropalumbo">
                        <i class="fab fa-github mr-2"></i>Lorenzo Veropalumbo
                    </a>
                </p>
                <p class="mr-3 mt-3">
                    <a class="text-white" href="https://github.com/AngeloDalicandro">
                        <i class="fab fa-github mr-2"></i>Angelo d'Alicandro
                    </a>
                </p>
                <p class="mr-3 mt-3">
                    <a class="text-white" href="https://github.com/DNParadox">
                        <i class="fab fa-github mr-2"></i>Francesco Marra
                    </a>
                </p>
                <p class="mt-3">
                    <a class="text-white" href="https://github.com/JacopoNa">
                        <i class="fab fa-github mr-2"></i>Jacopo Nardelli
                    </a>
                </p>
            </div>
        </div>
    </div>
    <div class="footer-bottom pt-2 pb-2">
        <div class="container text-white text center">
            &copy; Boolean Careers | Team 2 - Classe 66
        </div>
    </div>
  </footer>

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