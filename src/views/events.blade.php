@extends('template')

	@section('title')
		Événements BDE Exia
	@stop
	
	@section('main_content')

	@if(isset($msg['error']))
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
			{{ $msg['valid'] }}<br />
		</div>
	@endif

	<h1 id="events">Événements BDE Exia</h1>
	@*foreach($eventUp as $thisEvent)
		
		<!--<div class="container jumbotron jumbotron-fluid">
			<div class="row">
				<img src="{{event_picture}}" class="col-md-3 col-sm-6" alt="image évènement"> 
				<div class="col-md-9 col-sm-12">
					<div class="row">
						<h2 class="col-md-9 col-sm-12">{{--$thisEvent->$event_title--}}</h2>
						<h2 class="col-md-3 col-sm-12">{{--$thisEvent->$event_price--}}</h2>
						<h3 class="col-md-4 col-sm-12">{{--$thisEvent->$start_date--}}</h3>
						<div class="col-md-4 col-sm-12">
							<button type="button" class="btn btn-secondary">S'inscrire</button>
						</div>
						<div class="btn-group col-md-4 col-sm-12">
						  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Modifier
						  </button>
						  <div class="dropdown-menu">
							<a class="dropdown-item" href="#">Bloquer</a>
							<a class="dropdown-item" href="#">Supprimer</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">Separated link</a>
						  </div>
						</div>
					</div>
				</div>
			</div>
		</div>-->
		
	@*endforeach

	<h1 id="ideas">Boîte à idées</h1>

	<div class="row">
		@if($ideas->isEmpty())
			Il n'y a aucune idée proposée actuellement
		@else
			@foreach($ideas as $idea)
			<div class="col-md-4">
			  <div class="card mb-4 box-shadow">
				<div class="card-body">
				  <p class="card-text">{{ $idea->idea_title }}<span class="text-muted">, {{ $idea->User->first_name }} {{ $idea->User->name_user }}</span></p>
				  <div class="d-flex justify-content-between align-items-center">
				  	{{ $idea->idea }}
				  	@if(isset($user))
					<span class="like" id="{{ $idea->idea_id }}">
						<i class="fas fa-thumbs-up"></i>
					</span>
					@endif
					<small class="text-muted">{{ $idea->idea_number_vote }}</small>
				  </div>
				</div>
				<div class="card-footer text-muted">
					Proposé le {{ date('j/m à H:i:s', strtotime($idea->post_at)) }}
				</div>
			  </div>
			</div>
			@endforeach
		@endif
	</div>

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