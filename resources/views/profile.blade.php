<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>ENL</title>
  <!-- Favicon -->
  <link rel="icon" href="{{asset('assets/dashbord/assets/img/brand/favicon.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{asset('assets/dashbord/assets/vendor/nucleo/css/nucleo.css')}}" type="text/css">
  <link rel="stylesheet" href="{{asset('assets/dashbord/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{asset('assets/dashbord/assets/css/argon.css?v=1.2.0')}}" type="text/css">

</head>

<body>
  <!-- Sidenav -->

  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('assets/dashbord/assets/img/brand/blue.png')}}" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/dashbord') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>    
            <li class="nav-item">
              <a class="nav-link active"  href="{{ url('/profile') }}">
                <i class="ni ni-single-02 text-yellow"></i>
                <span class="nav-link-text">Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/tables.html">
                <i class="ni ni-bullet-list-67 text-default"></i>
                <span class="nav-link-text">Tables</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/login.html">
                <i class="ni ni-key-25 text-info"></i>
                <span class="nav-link-text">Login</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="examples/register.html">
                <i class="ni ni-circle-08 text-pink"></i>
                <span class="nav-link-text">Register</span>
              </a>
            </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6>
         
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->

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
</div>

@endsection
              
            
    </div>
  </div>

  <script src="{{asset('assets/dashboard/assets/js/argon.js')}}"></script>
  <script  src="{{ asset('assets/js/jquery-3.3.1.js')}}"></script>
</body>

</html>
