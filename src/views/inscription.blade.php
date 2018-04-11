@extends('template')
	
	@section('title')
		Inscription
	@stop
	
	@section('main_content')	
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
		<form>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="NomInscription" class="col-sm-2 col-form-label">Nom</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="NomInscription" placeholder="Nom">
			  <!-- <div class="valid-feedback">
				Cette addresse e-mail existe 
			  </div> -->
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="PrenomInscription" class="col-sm-2 col-form-label">Prénom</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="PrenomInscription" placeholder="Prénom">
			  <!-- <div class="valid-feedback">
				Cette addresse e-mail existe
			  </div> -->
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="Email" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-6">
			  <input type="email" class="form-control" id="Email" placeholder="Email">
			  <!--<div class="valid-feedback">
				Cette addresse e-mail existe
			  </div> -->
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="MotDePasseInscription" class="col-sm-2 col-form-label">Mot de passe</label>
			<div class="col-sm-6">
			  <input type="password" class="form-control" id="MotDePasseInscription" placeholder="Mot de passe">
				<!--<div class="invalid-feedback">
					Mauvais mot de passe
				</div> -->
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="MotDePasseConfirmation" class="col-sm-2 col-form-label">Confirmer le mot de passe</label>
			<div class="col-sm-6">
			  <input type="password" class="form-control" id="MotDePasseConfirmation" placeholder="Confirmer le mot de passe">
				<!-- <div class="invalid-feedback">
					Mauvais mot de passe
				</div> -->
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-5">
			</div>
			<div class="col-sm-4">
			  <button type="submit" class="btn btn-outline-dark">Inscription</button>
			</div>
		  </div>
		</form>
		</div>
	</div>
	@stop