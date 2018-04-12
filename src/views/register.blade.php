@extends('template')
	
	@section('title')
		Inscription
	@stop
	
	@section('main_content')	
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
		<form method="post" action="/register">
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="NomInscription" class="col-sm-2 col-form-label">Nom</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="NomInscription" placeholder="Nom" name="nom">
			  <div class="invalid-feedback">
				Veuillez rentrer un nom
			  </div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="PrenomInscription" class="col-sm-2 col-form-label">Prénom</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="PrenomInscription" placeholder="Prénom" name="prenom">
			  <div class="invalid-feedback">
				Veuillez rentrer un prénom
			  </div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="Email" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-6">
			  <input type="email" class="form-control" id="Email" placeholder="Email" name="courriel">
			  <div class="invalid-feedback">
				Veuillez rentrer une addresse e-mail
			  </div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="MotDePasseInscription" class="col-sm-2 col-form-label">Mot de passe</label>
			<div class="col-sm-6">
			  <input type="password" class="form-control" id="MotDePasseInscription" placeholder="Mot de passe" data-toggle="tooltip" data-placement="right" title ="Au moins: Une majuscule / Une minuscule / Un chiffre / 8 caractères" name="mdp" >
				<div id="feedbackMDP" class="invalid-feedback">
				</div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="MotDePasseConfirmation" class="col-sm-2 col-form-label">Confirmer le mot de passe</label>
			<div class="col-sm-6">
			  <input type="password" class="form-control" id="MotDePasseConfirmation" placeholder="Confirmer le mot de passe">
				<div class="invalid-feedback">
					Les mots de passe sont différents
				</div>
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