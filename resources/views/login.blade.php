@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" >
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >
		<title>Sign In</title>
		
		 <link rel="stylesheet" href="{{asset('assets/designeStyle/index.css')}}">
		 
	</head>
	<body>
		<section class="login_section">
			<div class="login_content">
				<form method="POST" action="{{ route('login') }}">
                        @csrf
				<div class="login_form">
					<div class="title">Se connecter</div>
					
					<div class="form-content">
						<div class="lbl">Email</div>
					
						<input id="email" type="email" class="nw-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

						   @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
					</div>
					<div class="form-content">
						<div class="lbl">Mot de passe</div>
						<!-- <input
							type="password"
							class="nw-input"
							placeholder="Mot de passe"
						/> -->
						<input id="password" type="password" class="nw-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
 
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
					</div>
					    <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                       
				</div>
                 </form>
				<div class="close_form">
					<img src="{{asset('assets/designeStyle/img1.png')}}" alt="Sign In Image" />
				</div>
			</div>
		</section>  
                    

		<script  src="{{ asset('assets/designeStyle/index.js')}}"></script>
	</body>
</html>
@endsection