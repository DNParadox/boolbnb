@extends('layouts.URAdashboard')

@section('content')
  @foreach ($sponsorships as $sponsorship)
    <div>nome: {{$sponsorship->name}}</div> 
    <div>ore: {{$sponsorship->hour}}</div>
    <div>prezzo: {{$sponsorship->price}}</div>
  @endforeach
  <div id="dropin-wrapper">
    <div id="checkout-message"></div>
    <div id="dropin-container"></div>
    <button id="submit-button">Submit payment</button>
  </div>
  <!-- includes the Braintree JS client SDK -->
  <script src="https://js.braintreegateway.com/web/dropin/1.33.4/js/dropin.min.js"></script>

  <!-- includes jQuery -->
  <script src="http://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
  <script>
    function generateToken(){
      $.ajax({
        type: 'GET',
        url: 'http://127.0.0.1:8000/api/orders/generate',
      }).done(function(result) {
        
      });
    }
    var button = document.querySelector('#submit-button');
  
    braintree.dropin.create({
      // Insert your tokenization key here
      authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
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
                    'token': payload.nonce,
                    'product' : 2
                  }
          }).done(function(result) {
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
              $('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
            } else {
              console.log(result);
              $('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
            }
          });
        });
      });
    });
  </script>
@endsection