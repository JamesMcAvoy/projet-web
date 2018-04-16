@extends('template')

	@section('title')
		Créer une idée
	@stop

	@section('main_content')	
	<div class="jumbotron jumbotron-fluid">
		<div class="container">
		<form method="post" action="/CreateIdea">
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="idea_title" class="col-sm-2 col-form-label">Nom de l'évenement</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="idea_title" placeholder="Titre" name="idea_title">
			  <div class="invalid-feedback">
				Veuillez rentrer le titre de l'évenement
			  </div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-2">
			</div>
			<label for="idea" class="col-sm-2 col-form-label">Description</label>
			<div class="col-sm-6">
			  <input type="text" class="form-control" id="idea" placeholder="idea" name="idea">
			  <div class="invalid-feedback">
				Veuillez rentrer La description de l'evenment
			  </div>
			</div>
		  </div>
		  <div class="form-group row">
			<div class="col-sm-5">
			</div>
			<div class="col-sm-4">
			  <button type="submit" class="btn btn-outline-dark">Créer</button>
			</div>
		  </div>
		  <div class="row">
				<div class="col-sm-2">
				</div>
				<div class="col-sm-7">
				</div>
			</div>
		</form>
		</div>
	</div>
	@stop