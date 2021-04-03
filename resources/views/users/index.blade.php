@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Client Lists</h1>

		<!-- 	 {{$index=0}} -->

			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Index</th>
						<th>Name</th>
						<th>Email</th>
						<th>Rolse</th>
						<th>Edite</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $index=>$user)
					<tr>
						<td>{{ $index++ }}</td>
						<td>{{ $user->name}}</td>
						<td>{{ $user->email}}</td>
						<td>
								@foreach($user->roles as $index=>$role)
				 {{  $role->display_name }} {{  $index+1 < $user->roles->count() ? ',' : '' }}

								@endforeach
						</td>
						<td><a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">EDIT</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
</div>

@endsection