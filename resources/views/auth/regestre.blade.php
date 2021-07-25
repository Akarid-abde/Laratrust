
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
					<img src="{{asset('assets/designeStyle/img1.png')}}" alt="Sign In Image" />
				</div>
				   <form method="POST" action="{{ route('register') }}">
                        @csrf
				<div class="login_form">
					<div class="title">S'inscrire</div>
					<div class="line __2">
						<div class="form-content">
							<div class="lbl">Name</div>
							<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
						</div>
						<div class="form-content">
							<div class="lbl">Nom</div>
							<input
								type="password"
								class="nw-input minimize"
								placeholder="Nom"
							/>
						</div>
					</div>
					
			
					<div class="line __2">
						<div class="form-content">
							<div class="lbl">Mot de passe</div>
							<!-- a -->
						</div>
						<div class="form-content">
							<div class="lbl">Répéter le mot de passe</div>
							<!-- <input
								type="password"
								class="nw-input minimize"
								placeholder="Répéter le mot de passe"
							/> -->
						</div>
					</div>
				
					<button class="actn-btn-form nw-btn">s'inscrire</button>
					
				</div>
			</div>
		</section>
	<script  src="{{ asset('assets/designeStyle/index.js')}}"></script>
	</body>
</html>
