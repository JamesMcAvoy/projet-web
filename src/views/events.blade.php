@extends('template')

	@section('title')
		Événements BDE Exia
	@stop
	
	@section('main_content')

	@if(isset($msg['error'])) {{ dd($msg['error']) }}
		<div class="page-header">
			<h2>Erreur</h2>
		</div>
		<div class="alert alert-danger">
			@foreach($msg['error'] as $line)
				{{ $line }}<br />
			@endforeach
		</div>
	@elseif(isset($msg['valid']))
		<div class="alert alert-success">
			@foreach($msg['valid'] as $line)
				{{ $line }}<br />
			@endforeach
		</div>
	@endif

	<h1 id="events">Événements BDE Exia</h1>

	<h1 id="ideas">Boîte à idées</h1>

	<h1 id="form">Proposer une idée</h1>

	@if(isset($user))
		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
			<form method="post" action="/events/idea">
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
				  <textarea class="form-control" id="idea" name="idea" placeholder="Votre proposition"></textarea>
				  <div class="invalid-feedback">
					Veuillez rentrer la description de l'evenment
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
			</form>
		  </div>
		</div>
	@else
		<div class="alert alert-danger">
			Vous devez être connecté pour proposer une idée !
		</div>
	@endif

	@stop