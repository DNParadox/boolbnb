@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center boxshadow">
        <div class="col-md-6 ">
            {{-- iniziio carta  --}}
            
            <div class="card sx">
                <div class="card-body d-flex justify-content-center">
                   <figure class="imgregister">
                        <a href="{{ route( 'logged.apartments.index') }}">
                            <img src="{{ asset('storage/' . 'airbnb.png') }}" alt="BoolBnB">
                        </a>
                   </figure>
                </div>
            </div>            
        </div>


        <div class="col-md-6">
            {{-- iniziio carta  --}}
            
            <div class="card dx">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body">
                    <form id="register-form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name </label>

                            <div class="col-md-6">
                                <input placeholder="Nome" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="surname" class="col-md-4 col-form-label text-md-right">Cognome </label>

                            <div class="col-md-6">
                                <input placeholder="Cognome" id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}"  autocomplete="surname" autofocus>
                            </div>
                        </div>
 

                        <div class="form-group row">
                            <label for="born_date" class="col-md-4 col-form-label text-md-right"> Data di nascita </label>

                            <div class="col-md-6">
                                <input placeholder="Data di nascita: gg / mm / aaaa" id="born_date" type="date" class="form-control @error('born_date') is-invalid @enderror" name="born_date" value="{{ old('born_date') }}" autocomplete="born_date" autofocus>

                                @error('born_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email <span class="required-red"> * </span>  </label>

                            <div class="col-md-6">
                                <input placeholder="Email *" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password <span class="required-red"> * </span> </label>

                            <div class="col-md-6">
                                <input placeholder="Password *" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Conferma Password <span class="required-red"> * </span> </label>

                            <div class="col-md-6">
                                <input placeholder="Conferma Password *" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="col-md-6" id="password-error"></div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="submit-button" type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>




            
        </div>


        
    </div>
</div>


<script>
    const input = document.getElementById('submit-button');
    
    input.addEventListener('click', 
    function(e) {
        const password = document.getElementById('password');
        const passwordConfirm = document.getElementById('password-confirm');
    

        if(password.value.length < 8) {
            e.preventDefault();
            password.setCustomValidity('La password deve essere lunga almeno 8 caratteri');
            password.reportValidity();
        } else { 
            password.setCustomValidity('')
            password.reportValidity();
        }
        
        if(password.value != passwordConfirm.value) {
            e.preventDefault();
            passwordConfirm.setCustomValidity('Le password non corrispondono');
            passwordConfirm.reportValidity();
        } else { 
            passwordConfirm.setCustomValidity('')
            passwordConfirm.reportValidity();
        }

    })
</script>
@endsection
