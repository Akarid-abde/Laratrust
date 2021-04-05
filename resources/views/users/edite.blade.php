@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Edit User {{$user->name}}</h1>

			
              <form action="{{ route('users.update',$user->id) }}" method="post">

              	{{ csrf_field() }}
              	{{ method_field('put') }}

              	<div class="form-group">
              		<label>Name</label>
              		<input type="text" name="name" class="form-control" value="{{$user->name}}">
              	</div>

              	<div class="form-group">
              		<label>email</label>
              		<input type="email" name="email" disabled="true" class="form-control" value="{{$user->email}}">
              	</div>

              	<div class="form-group">
                            <label>Rolses</label>
                            <div class="checkbox">
                                   <label>
                                          <input type="checkbox" name="roles[]" value="superA" 
                                          {{ $user->hasRole('superA') ? 'checked' : '' }}> Super Admin
                                   </label>
                            </div>

              		<div class="checkbox">
              			<label>
              				<input type="checkbox" name="roles[]" value="admin" 
              				{{ $user->hasRole('admin') ? 'checked' : '' }}> Admin
              			</label>
              		</div>

              		<div class="checkbox">
              			<label>
              				<input type="checkbox" name="roles[]" value="client"  
              				{{ $user->hasRole('client') ? 'checked' : '' }}> Client
              			</label>
              		</div>
              	</div>


              	<div class="form-group">
              		<button class="btn btn-success" type="submit">Update</button>
              	</div>
              </form>
	

		</div>
	</div>
</div>

@endsection