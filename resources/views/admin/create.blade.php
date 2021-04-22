@extends('layouts.app')


@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<form action="{{ url('/super') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

				<div class="form-group @if($errors->get('name')) has-error @endif">
					<label for="">Name</label>
					<input type="text" name="name" class="form-control" value="{{ old('name') }}">
			    @if($errors->get('name'))
			    <div class="alert alert-danger" role="alert">
                    <ul>
                    @foreach($errors->get('name') as $message)
                      <li>{{ $message }}</li>
                    @endforeach
                     </ul>
                </div>
                @endif
				</div>

				<div class="form-group has-error">
					<label for="">email</label>
					<input  type="text" name="email" class="form-control">{{ old('email') }}
					
			    @if($errors->get('email'))
			    <div class="alert alert-danger" role="alert">
                    <ul>
                    @foreach($errors->get('email') as $message)
                      <li>{{ $message }}</li>
                    @endforeach
                     </ul>
                     </div>
                @endif
				</div>

				<div class="form-group @if($errors->get('password')) has-error @endif">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control" value="{{ old('password') }}">
			    @if($errors->get('password'))
			    <div class="alert alert-danger" role="alert">
                    <ul>
                    @foreach($errors->get('password') as $message)
                      <li>{{ $message }}</li>
                    @endforeach
                     </ul>
                </div>
                @endif
				</div>

					<div class="form-group">
                            <label>Rolses</label>

              		<div class="checkbox">
              			<label>
              				<input type="checkbox" name="roles[]" value="admin"> Admin
              			</label>
              		</div>

              	</div>

				<div class="form-group">
					<label>Image</label>
					<input class="form-control" type="file" name="photo">
				</div>
                <hr>
				<div class="from-group">
					<input type="submit" class="form-control btn btn-primary" value="Enregistrer">
				</div>
			</form>
		</div>
	</div>
</div>

@endsection