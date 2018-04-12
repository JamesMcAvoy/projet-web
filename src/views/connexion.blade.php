@extends('template')

	@section('title')
		Connexion
	@stop
	
	@section('main_content')	
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
		<form action="/register" method="post">
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="EmailConnexion" class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-6">
			  <input type="email" class="form-control is-valid" id="EmailConnexion" placeholder="Email">
			  <div class="valid-feedback">
				Cette addresse e-mail existe
			  </div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="MotDePasseConnexion" class="col-sm-2 col-form-label">Mot de passe</label>
			<div class="col-sm-6">
			  <input type="password" class="form-control is-invalid" id="MotDePasseConnexion" placeholder="Mot de passe">
				<div class="invalid-feedback">
					Mauvais mot de passe
				</div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-5">
			</div>
			<div class="col-sm-4">
			  <button type="submit" class="btn btn-outline-dark">Connexion</button>
			</div>
		  </div>
		</form>
			<div class="row">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-7">
				<a href="/inscription">Pas encore inscrit ? Clique-ici pour t'inscrire !</a>
				</div>
			</div>
		</div>
	</div>
	@stop