@extends('layouts.app')

@section('content')


<div class="container">
<div class="row" style="margin: 15px;">

@if(Auth::user()->hasRole('superA'))

	<div class="row" style="margin: 10px;">
		<div class="col-md-12">
			<h1> Liste des Admins </h1>
             <div style="margin-left: 80%;">
             	<a href="{{ url('super/create') }}" class="btn btn-warning"> Nouveau Admin </a>
             </div>
         </div>
     </div>

@elseif(Auth::user()->hasRole('admin'))

 	<div class="row" style="margin: 10px;">
		<div class="col-md-12">
			<h1> Liste des Clients </h1>
             <div style="margin-left: 80%;">
             	<a href="{{ url('super/create') }}" class="btn btn-warning"> Nouveau Client </a>
             </div>
         </div>
     </div>

 @endif

@foreach($users as $index=>$user)
@if($user->hasRole('admin') &&  Auth::user()->hasRole('superA'))
<div class="col-sm-6 col-md-4" style="margin: 10px;">
    
     <div class="card" style="width: 18rem; border-radius: 20%;">
  <img class="card-img-top" src="{{ asset('/images/RC.png') }}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $user->name }}</h5>
    <p class="card-text">{{ $user->email }}</p>
        <form action="{{ url('super/'.$user->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <!-- <a href="" class="btn btn-primary">Details</a> -->
        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary">edit</a>
        <!-- <a href="" class="btn btn-default">show</a> -->

   <button type="submit"  class="btn btn-danger">Delete</button>
   
                        </form>
  </div>

</div>
</div>
@endif
@endforeach
</div>

<div class="row">
@foreach($users as $index=>$user)
@if($user->hasRole('client') &&  Auth::user()->hasRole('admin'))
<div class="col-sm-6 col-md-4">

    
     <div class="card" style="width: 18rem;">
  <img class="card-img-top"  alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{ $user->name }}</h5>
    <p class="card-text">{{ $user->email }}</p>
        <form action="" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
       <!--  <a href="" class="btn btn-primary">Details</a> -->
        <a href="" class="btn btn-warning">edit</a>
        <a href="" class="btn btn-default">show</a>

   <button type="submit"  class="btn btn-danger">Delete</button>
    </form>
  </div>

</div>
</div>
@endif
@endforeach
</div>


	<div class="row">
		<div class="col-md-12">
			<h1>Users Lists</h1>

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
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>
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