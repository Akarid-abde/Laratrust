@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Sign Up</title>
		<link rel="stylesheet" href="./index.css" />
	</head>
	<body>
		<section class="login_section">
			<div class="login_content">
				<div class="close_form">
					<img src="./img0.png" alt="Sign Up Image" />
				</div>
				<form method="POST" action="{{ route('register') }}">
                        @csrf
				<div class="login_form">
					<div class="title">S'inscrire</div>
					<div class="line __2">
						<div class="form-content">
							<div class="lbl">Name</div>
							<!-- <input
								type="text"
								class="nw-input minimize"
								placeholder="Prénom"
							/> -->
							<div class="col-md-6">
                                <input id="name" type="text" class="nw-input minimize @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
						</div>
				
					</div>
					<div class="line __2">
						
					</div>
					<div class="line __2">
						<div class="form-content">
							<div class="lbl">Email</div>
							 <div class="col-md-6">
                                <input id="email" type="email" class="nw-input minimize @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
						</div>
					</div>
					<div class="line __2">
					    <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
					</div>
					
					<div class="line __3">
					<div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
					</div>
					  <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
				</form>
				</div>
			</div>
		</section>
	</body>
</html>
@endsection