@extends('layouts.URAdashboard')

@section('content')
{{ $apartment }}
<div class="payment-options">
  @foreach ($sponsorships as $sponsorship)
    <div class="payment-row">    
      <div>Nome: {{$sponsorship->name}}</div> 
      <div>Ore: {{$sponsorship->hour}}</div>
      <div>Prezzo: {{$sponsorship->price}} €</div>
      <div class="pointer" onclick="cretePayment({{$sponsorship->id}}, '{{$tokenAutorization}}')">Paga</div>
    </div>
  @endforeach 
</div>
  <div id="dropin-wrapper" class="payment-wrapper">
    <div id="checkout-message"></div>
    <div id="dropin-container"></div>
    <button id="submit-button">Submit payment</button>
  </div>
  <!-- includes the Braintree JS client SDK -->
  <script src="https://js.braintreegateway.com/web/dropin/1.33.4/js/dropin.min.js"></script>

  <!-- includes jQuery -->
  <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
  <script>
    
    function cretePayment(id,tokenAutorization){
      $('#dropin-container').html("");
      var button = document.querySelector('#submit-button');
      
      braintree.dropin.create({
        // Insert your tokenization key here
        authorization: tokenAutorization,
        container: '#dropin-container'
      }, function (createErr, instance) {
        button.addEventListener('click', function () {
          instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
            // When the user clicks on the 'Submit payment' button this code will send the
            // encrypted payment information in a variable called a payment method nonce

            $.ajax({
              type: 'POST',
              url: 'http://127.0.0.1:8000/api/orders/make/payment',
              data: {
                      "token": payload.nonce,
                      "product" : id
                    }
            }).done(function(result) {
              console.log(result);
              // Tear down the Drop-in UI
              instance.teardown(function (teardownErr) {
                if (teardownErr) {
                  console.error('Could not tear down Drop-in UI!');
                } else {
                  console.info('Drop-in UI has been torn down!');
                  // Remove the 'Submit payment' button
                  $('#submit-button').remove();
                }
              });

              if (result.success) {
                $('#checkout-message').html('<h1>Success</h1><p>il tuo pagamento è andato a buon fine</p>');
              } else {
                console.log(result);
                $('#checkout-message').html('<h1>Retry</h1><p>il tuo pagamento non è andato a buon fine</p>');
              }
            });
          });
        });
      });
    }
   
  </script>
@endsection