<!DOCTYPE html>
<html lang="en">
<head>
	<title>Document</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
  <link href="{{ asset('assets/css/style/style.css') }}" rel="stylesheet">
</head>
<body>

      <div id="app">
        <div style="margin-bottom: 10px;">
              @include('partial.menu')
    </div>
    
    <div style="margin-bottom: 10px;">
              @include('partial.menu1')
    </div>

    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-8">
      @extends('partial.flash')
        </div>
     </div>
    </div>


        <main class="py-4">
            @yield('content')
        </main>

  
    </div>



@if(Auth::user()->hasRole('client') || Auth::user()->hasRole('client'))

<div class="container-fluid" id="grad1">
    <div class="row justify-content-center mt-0">
        <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                <h2><strong>Suiver Les Etaps a fin de Crier votre entreprise</strong></h2>
                <p>Fill all form field to go to next step</p>
                <div class="row">
                    <div class="col-md-12 mx-0">

    <div id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="account"><strong>Account</strong></li>
                                <li id="personal"><strong>Personal</strong></li>
                                <li id="CN"><strong>D-CN</strong></li>
                                <li id="SCC"><strong>Import - SCC</strong></li>
                                <li id="LTP"><strong>LTP</strong></li>
                                <li id="RC"><strong>D-RC</strong></li>
                                <li id="IF"><strong>D-IF</strong></li>
                                <li id="payment"><strong>Payment</strong></li>
                                <li id="DOC"><strong>Documentation</strong></li>
                                <li id="confirm"><strong>Finish</strong></li>
                            </ul> 

    <!-- fieldsets -->
    <fieldset> 
   <div class="form-card">
    <h2 class="fs-title">Account Information</h2> 
    <form action="{{url('/update/'.Auth::user()->id ) }} " method="post" enctype="multipart/form-data" class="form-inline col-md-offset-2 ">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}

     <div class="form-group">
      <label for="IDClient">IDClient</label>
     <input type="Number" class="form-control"   name="id" disabled="disabled" value="{{Auth::user()->id}}" />
    </div>

    <div class="form-group">
      <label for="name">Nom et Prenom</label>
    <input type="text" name="name" class="form-control"   placeholder="First Name" value="{{Auth::user()->name}}" /> 
    </div>

    <div class="form-group">
     <label for="email">email</label>
    <input type="text" name="email" class="form-control" disabled="disabled"  placeholder="Contact No." value="{{Auth::user()->email}}" /> 
    </div>


    <button class="btn btn-primary" style="border-radius:15px;">
    Valider
    </button>
 

  </form>    
  </div>
  <input type="button" name="next" class="next action-button" value="Next Step" />
  </fieldset>


    <fieldset>
    <div class="form-card">
    <h2 class="fs-title">Personal Information</h2> 
     <form action="{{url('/fiche/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="exampleFormControlInput1">IdUser</label>
    <input type="text" value="{{Auth::user()->id}}" disabled="disabled" name="user_id" class="form-control">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">nom Prenom</label>
    <input type="text" value="{{Auth::user()->name}}" disabled="disabled"  name="name" class="form-control" >
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Email</label>
    <input type="text" value="{{Auth::user()->email}}" disabled="disabled"  name="email" class="form-control" >
  </div>
<!--   <div class="form-group">
    <label for="exampleFormControlInput1">TypeFiche</label>
  <input type="text" value="CN"  name="typefiche" class="form-control" placeholder="Nom et Prenom">
  </div> -->
  
  <div class="form-group">
    <label for="exampleFormControlInput1">CIN</label>
    <input type="text"  name="cin" class="form-control" placeholder="CIN">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Date Naissance</label>
    <input type="date" name="dateNaissance" class="form-control"  placeholder="date expération">
  </div>

  <div class="form-group">  
  <label>Nationalité</label>
    <input type="text" name="nationalite" placeholder="nationalite" class="form-control" /> 
  </div>

    <div class="form-group">  
  <label>Ville</label>
    <input type="text" name="ville" placeholder="Ville" class="form-control" /> 
  </div>

<div class="form-group">
     <label>Tele</label>
    <input type="Number" name="tele" placeholder="tele" /> 
  </div>
<div class="form-group">
     <label>fax</label>
    <input type="Number" name="fax" placeholder="fax" /> 
</div>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Adresse</label>
    <textarea name="Adresse" placeholder="Adresse" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

   <div class="form-group">
    <label for="exampleFormControlTextarea1">Lieu Naissance</label>
    <textarea name="lieuNaissance" placeholder="Lieu Naissance" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>

   <div class="form-group">
    <label for="exampleFormControlSelect1">Form Juridique</label>
    <select class="form-control" name="ObjetDemande" id="exampleFormControlSelect1">
      <option selected="select" disabled="disabled">choisir form Juridique</option>
      <option value="P" >Persone Physique</option>
      <option value="M" >Personne Morale</option>
    </select>
  </div>
  

  <div class="form-group">
    <button class="btn btn-primary" style="border-radius:15px;">
    Valider
    </button>
  </div>
    </form>
    <!-- <input type="text" name="fname" placeholder="First Name" /> 
    <input type="text" name="lname" placeholder="Last Name" /> 
    <input type="text" name="phno" placeholder="Contact No." /> 
    <input type="text" name="phno_2" placeholder="Alternate Contact No." /> -->
    </div> 
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> <input type="button" name="next" class="next action-button" value="Next Step" />
    </fieldset>





    <fieldset>
    <div class="form-card">
    <h2 class="fs-title">CN</h2> 
    <form action="{{url('/fiche/store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
    <label for="exampleFormControlInput1">IdClient</label>
    <input type="text" value="{{Auth::user()->id}}" disabled="disabled"  name="user_id" class="form-control" placeholder="Nom et Prenom">
<!--   </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">TypeFiche</label>
    <input type="text" value="CN"  name="typefiche" class="form-control" placeholder="Nom et Prenom">
  </div> -->
</div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Bénifice</label>
<input type="text"  value="{{Auth::user()->name}}" disabled="disabled" name="bénificier" class="form-control" placeholder="Nom et Prenom">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">ICE</label>
    <input type="text" name="ICE" disabled="disabled" class="form-control"  placeholder="ICE" required="required">
  </div>

   <div class="form-group">
    <label for="exampleFormControlTextarea1">domination/Raison-Sociale</label>
    <textarea name="raison" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="domination/Raison-Commercial"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlSelect1">Form Juridique</label>
    <select class="form-control" name="FormJuridique" id="exampleFormControlSelect1">
      <option value="SARL" >SARL</option>
      <option value="SAS" >SAS</option>
    </select>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Date Experation</label>
    <input type="date" name="dateExpération" class="form-control"  placeholder="date expération" required="required">
  </div>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Activité Commercial </label>
    <textarea name="Activité" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Activité/domination/Raison-Commercial"></textarea>
  </div>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Lieu Activité/Ville</label>
    <input type="text"  name="lieuActivite" class="form-control" placeholder="Lieu Activité/Ville"  required="required">
  </div>

  

  <div class="form-group">
    <button class="btn btn-primary" style="border-radius:15px;">
    Demander Certificat Nigative
    </button>
  </div>
    </form>
    </div> 
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next Step" />
    </fieldset>


    <fieldset>
    <div class="form-card">
    <h2 class="fs-title">Status et CIN et ContractBuy</h2> 
    <form action="{{url('/fiche/store') }}" method="post" enctype="multipart/form-data">
    @csrf
      <div class="form-group">
         <label>status</label>
         <input class="form-control" type="file" name="status" required="true">
    </div>
    <div class="form-group">
         <label>CIN</label>
         <input class="form-control" type="file" name="CIN" required="true">
    </div>
    <div class="form-group">
         <label>contratBuy</label>
         <input class="form-control" type="file" name="ContractBuy" required="true">
    </div>
    
    <div class="form-group">
       <button class="btn btn-primary" style="border-radius:15px;">
        Importer les documents et Demande LTP
       </button>
    </div>

    </form>
    </div> 
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
    <input type="button" name="next" class="next action-button" value="Next Step" />
    </fieldset>



<fieldset>
 <div class="form-card">
 <h2 class="fs-title">LTP</h2> 
 <form action="{{url('/fiche/store') }}" method="post" enctype="multipart/form-data">
    @csrf  

  <div class="form-group">
  <label for="exampleFormControlInput1">IdClient</label>
  <input type="text" value="{{Auth::user()->id}}" disabled="disabled"  name="user_id" class="form-control" placeholder="Nom et Prenom">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Bénifice</label>
<input type="text"  value="{{Auth::user()->name}}" disabled="disabled" name="bénificier" class="form-control" placeholder="Nom et Prenom">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">ICE</label>
    <input type="text" name="ICE" disabled="disabled" class="form-control"  placeholder="ICE" required="required">
  </div>

   <div class="form-group">
    <label for="exampleFormControlTextarea1">domination/Raison-Sociale</label>
    <textarea name="raison" disabled="disabled" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="domination/Raison-Commercial"></textarea>
  </div>


  <div class="form-group">
    <label for="exampleFormControlInput1">Date Experation</label>
    <input type="date" name="dateExpération" disabled="disabled" class="form-control"  placeholder="date expération" required="required">
  </div>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Activité Commercial </label>
    <textarea name="Activité" disabled="disabled" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Activité/domination/Raison-Commercial"></textarea>
  </div>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Lieu Activité/Ville</label>
    <input type="text"  name="lieuActivite" disabled="disabled" class="form-control" placeholder="Lieu Activité/Ville"  required="required">
  </div>
    
 </form>
    </div> 
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
    <input type="button" name="next" class="next action-button" value="Next Step" />
</fieldset>


    <fieldset>
    <div class="form-card">
    <h2 class="fs-title">D - RC</h2>
   <form action="{{url('/fiche/store') }}" method="post" enctype="multipart/form-data">
    @csrf  
    
      <div class="form-group">
  <label for="exampleFormControlInput1">IdClient</label>
  <input type="text" value="{{Auth::user()->id}}" disabled="disabled"  name="user_id" class="form-control" placeholder="Nom et Prenom">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Bénifice</label>
<input type="text"  value="{{Auth::user()->name}}" disabled="disabled" name="bénificier" class="form-control" placeholder="Nom et Prenom">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">ICE</label>
    <input type="text" name="ICE" disabled="disabled" class="form-control"  placeholder="ICE" required="required">
  </div>

   <div class="form-group">
    <label for="exampleFormControlTextarea1">domination/Raison-Sociale</label>
    <textarea name="raison" disabled="disabled" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="domination/Raison-Commercial"></textarea>
  </div>


  <div class="form-group">
    <label for="exampleFormControlInput1">Date CN</label>
    <input type="date" name="dateExpération" disabled="disabled" class="form-control"  placeholder="date expération" required="required">
  </div>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Activité Commercial </label>
    <textarea name="Activité" disabled="disabled" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Activité/domination/Raison-Commercial"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Date CN</label>
    <input type="date" name="dateExpération" disabled="disabled" class="form-control"  placeholder="date expération" required="required">
  </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Form Juridique</label>
    <input type="text" name="FormJuridique" disabled="disabled" class="form-control">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Activité Commercial </label>
    <textarea name="Activité" disabled="disabled" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Activité/domination/Raison-Commercial"></textarea>
  </div>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Lieu Activité/Ville</label>
    <input type="text"  name="lieuActivite" disabled="disabled" class="form-control" placeholder="Lieu Activité/Ville"  required="required">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Objet de demande </label>
    <input type="text"  name="ObjetDemande" disabled="disabled" class="form-control" placeholder="ObjetDemande">
  </div>

   <div class="form-group">
    <label for="exampleFormControlTextarea1">Capitale Montant</label>
    <input type="number"  name="Montant"  class="form-control" placeholder="Montant en DH"  required="required">
  </div>

  <button class="btn btn-primary" style="border-radius:15px;">
    Demande de RC
  </button>

  </form> 
    </div> 
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
    <input type="button" name="next" class="next action-button" value="Next Step" />
    </fieldset>

                            
    <fieldset>
    <div class="form-card">
    <h2 class="fs-title">D - IF</h2> 
     <form action="{{url('/fiche/store') }}" method="post" enctype="multipart/form-data">
    @csrf  
    
      <div class="form-group">
  <label for="exampleFormControlInput1">IdClient</label>
  <input type="text" value="{{Auth::user()->id}}" disabled="disabled"  name="user_id" class="form-control" placeholder="Nom et Prenom">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Bénifice</label>
<input type="text"  value="{{Auth::user()->name}}" disabled="disabled" name="bénificier" class="form-control" placeholder="Nom et Prenom">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">ICE</label>
    <input type="text" name="ICE" disabled="disabled" class="form-control"  placeholder="ICE" required="required">
  </div>

   <div class="form-group">
    <label for="exampleFormControlTextarea1">domination/Raison-Sociale</label>
    <textarea name="raison" disabled="disabled" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="domination/Raison-Commercial"></textarea>
  </div>


  <div class="form-group">
    <label for="exampleFormControlInput1">Date CN</label>
    <input type="date" name="dateExpération" disabled="disabled" class="form-control"  placeholder="date expération" required="required">
  </div>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Activité Commercial </label>
    <textarea name="Activité" disabled="disabled" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Activité/domination/Raison-Commercial"></textarea>
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Date CN</label>
    <input type="date" name="dateExpération" disabled="disabled" class="form-control"  placeholder="date expération" required="required">
  </div>

    <div class="form-group">
    <label for="exampleFormControlSelect1">Form Juridique</label>
    <input type="text" name="FormJuridique" disabled="disabled" class="form-control">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Activité Commercial </label>
    <textarea name="Activité" disabled="disabled" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Activité/domination/Raison-Commercial"></textarea>
  </div>

 <div class="form-group">
    <label for="exampleFormControlTextarea1">Lieu Activité/Ville</label>
    <input type="text"  name="lieuActivite" disabled="disabled" class="form-control" placeholder="Lieu Activité/Ville"  required="required">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Objet de demande </label>
    <input type="text"  name="ObjetDemande" disabled="disabled" class="form-control" placeholder="ObjetDemande">
  </div>

 

  <button class="btn btn-primary" style="border-radius:15px;">
    Demande de IF
  </button>

  </form> 
    </div> 
    <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
    <input type="button" name="next" class="next action-button" value="Next Step" />
    </fieldset>
                            

    <fieldset>
    <div class="form-card">
        <h2 class="fs-title">Payment Information</h2>
        <div class="radio-group">
            <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px"></div>
            <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px"></div> <br>
        </div> <label class="pay">Card Holder Name*</label> <input type="text" name="holdername" placeholder="" />
        <div class="row">
            <div class="col-9"> <label class="pay">Card Number *</label> <input type="text" name="cardno" placeholder="" /> </div>
            <div class="col-3"> <label class="pay">CVC *</label> <input type="password" name="cvcpwd" placeholder="***" /> </div>
        </div>
        <div class="row">
        <div class="col-3"> <label class="pay">Expiry Date *</label> </div>
        <div class="col-9"> 
            <select class="list-dt" id="month" name="expmonth">
             <option selected>Month</option>
             <option>January</option>
             <option>February</option>
             <option>March</option>
             <option>April</option>
             <option>May</option>
             <option>June</option>
             <option>July</option>
             <option>August</option>
             <option>September</option>
             <option>October</option>
             <option>November</option>
             <option>December</option>
             </select> 
             <select class="list-dt" id="year" name="expyear">
             <option selected>Year</option>
             </select> 
        </div>
             </div>
             </div> 
        <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
        <input type="button" name="next" class="next action-button" value="Next Step" />
        </fieldset>


        <fieldset>
            <div class="form-card">
            <h2 class="fs-title">Documentation</h2> 
            <input type="text" name="fname" placeholder="First Name" /> 
            <input type="text" name="lname" placeholder="Last Name" /> 
            <input type="text" name="phno" placeholder="Contact No." /> 
            <input type="text" name="phno_2" placeholder="Alternate Contact No." />
            </div> 
        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/> 
        <input type="button" name="next" class="next action-button" value="Next Step" />
        <input type="button" name="make_payment" class="next action-button" value="Confirm" />
        </fieldset>


        <fieldset>
          <div class="form-card">
          <h2 class="fs-title text-center">Success !</h2> <br><br>
          <div class="row justify-content-center">
       <div class="col-3"> 
        <img src="https://img.icons8.com/color/96/000000/ok--v2.png" class="fit-image"> </div>
          </div> <br><br>
          <div class="row justify-content-center">
          <div class="col-7 text-center">
              <h5>You Have Successfully Signed Up</h5>
          </div>
          </div>
         </div>
          </fieldset>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


<script src="{{ asset('assets/js/bootstrap.min.js')}}" type="text/javascript" ></script>
<script  src="{{asset('assets/js/jquery-3.3.1.js')}}"></script>
<script src="{{ asset('assets/js/style.js')}}" type="text/javascript" ></script>
    
    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script -->>

<script  src="{{ asset('assets/js/scripts-all.js')}}"></script>
<script  src="{{ asset('assets/js/main.js')}}"></script>
     @yield('script')
</body>
</html>