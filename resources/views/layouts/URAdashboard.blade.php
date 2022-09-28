<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
      <!-- Styles -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
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
          <div class="pr1 dropdown-btn" href="#">Menu <i class="fa-solid fa-chevron-down icon"></i></div>
          <ul class="dropdown-container">
            <li> 
              <a href="">
                Link 1 
              </a>
            </li>
            <li> 
              <a href="">
                Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <div class="profile_header">

        {{-- Area in testing --}}
        
        <div class="icon-container pr2 dropdown-btn"> <i class="fa-solid fa-user icon"></i></div>
        <ul class="dropdown-container tr">
          <li> 
            <a href="">
              Link 1 
            </a>
          </li>
          <li> 
            <a href="">
              Logout
            </a>
          </li>
        </ul>
      </div>


      {{-- Area Testing --}}
    </nav>
  </header>

  <main role="main">
      @yield('content')
  </main>
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