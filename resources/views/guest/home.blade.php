<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FRONT END</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link  rel='stylesheet'  type='text/css'  href='https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps.css'>
</head>
<body>

    {{-- Pagina dedicata al front end. Andrà a ricopiare la pagina inizale di airBnb --}}
    {{-- Aggiungete un file dedicato per l'header utilizzaando Vue  --}}
    {{-- Quindi la struttura avrà main che innesta Header, MainContent, Footer --}}
    <div id="root">
    </div>

    <script  src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/maps/maps-web.min.js"></script> 
    <script  src="https://api.tomtom.com/maps-sdk-for-web/cdn/5.x/5.64.0/services/services-web.min.js"></script> 
    <script src="{{ asset('js/app.js')}}"></script>
</body>
</html>
