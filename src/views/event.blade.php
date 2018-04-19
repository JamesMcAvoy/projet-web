@extends('template')

	@section('title')
		{{ $event->event_title }}
	@stop
	
	@section('main_content')
	
	<div class="container">
	  @if(isset($msg['error']))
	    <div class="page-header">
	      <h2>Erreur</h2>
	    </div>
	    <div class="alert alert-danger">
	      {{ $msg['error'] }}
	    </div>
	  @elseif(isset($msg['valid']))
	    <div class="alert alert-success">
	      {{ $msg['valid'] }}
	    </div>
	  @endif
		<div class="row">
			<a type="button" href="/events" class="btn btn-secondary btn-lg btn-block col-md-12 retour_accueil">Retour à l'index des événements</a>
			<div class="col-md-3 col-sm-12">
				<img id="image_event" src="/events/img/{{ $event->event_id }}" alt="image évènement">
			</div>
			<div class="row col-md-9 col-sm-12">
				<h2 class="col-md-8">{{ $event->event_title }}</h2>
				<h3 class="col-md-4">{{ $event->event_price }} €</h3>
				<h3 class="col-md-6">{{ date('j/m à H:i:s', strtotime($event->start_date)) }}</h3>
				<h3 class="col-md-6">Durée : {{ floor($event->time/60) }} heures</h3>
				@if($event->event_number > 1)
					<h3 class="col-md-6">Tous les {{ $event->time_between_each }} jours</h3>
				@endif
				@if(isset($user) && !$registered)
				<div class="col-md-12">
					<a type="button" href="/events/register/{{ $event->event_id }}" class="btn btn-success"><h3>S'inscrire</h3></a>
				</div>
				@endif
			</div>
			<h2 class="col-md-12">Description</h2>
			<p class="col-md-12 event_desc">{{$event->event}}</p>
			<div id="espace_photo">
				<h2 class="col-md-12">Photos</h2>
				
				<div class="col-md-12">
					@foreach($event->picture->sortByDesc('picture_number_like') as $picture)
						@if($picture->picture_state == 'valid')
						<div class="col-lg-3 col-md-4 col-sm-6 ">
							<img data-toggle="modal" data-target="#pic-{{ $picture->picture_id }}" src="/picture/{{ $picture->picture_id }}" alt="{{ $picture->picture_title }}" class="img_event">
						</div>
						  <div class="modal fade" id="pic-{{ $picture->picture_id }}" role="dialog">
							<div class="modal-dialog modal-lg">
							  <div class="modal-content">
								<div class="modal-header">
								  <h4 class="modal-title">{{ $picture->picture_title }}</h4>
								  <button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
								  <img src="/picture/{{ $picture->picture_id }}" alt="{{ $picture->picture_title }}" class="afficher_image">
								  <h5>posté le {{ date('j/m à H:i', strtotime($picture->picture_date)) }} par {{ $picture->user->name_user }} {{ $picture->user->first_name }}</h5>
								  <h4>Description</h4>
								  <p>
									{{ $picture->picture_desc }}
								  </p>
									<div id="espace_commentaire">
									  <h4>Commentaires</h4>
									  @if($picture->comment->isEmpty())
										 <p>Il n'y a pas de commentaire pour l'instant</p>
									  @else
										  <ul>
										  @foreach($picture->comment as $comment)
											<li>le {{ date('j/m à H:i', strtotime($comments->comment_date))}} | {{$comments->user->name_user}}: {{$comments->comment}} 
											@if($user['type'] == 'employee')
												<a type="button" href="<!-- lien Bloquer comment-->" class="btn btn-danger">Bloquer</a>
											@elseif($user['type'] == 'BDE')
												<a type="button" href="<!-- lien supprimer comment-->" class="btn btn-danger">Supprimer</a>
											@endif
											</li>
										  @endforeach
										  </ul>
									  @endif
									  <h5>Ajouter un commentaire</h5>
									@if(!isset($user))
										<div class="alert alert-danger">
											Vous devez être connecté pour poster un commentaire !
										</div>
									@else
										<form method="post" class="row" action="<!--lien ajout photo-->" id="form_add_picture">
										  <div class="form-group col-md-12">
											
											  <input type="text" class="form-control" id="idea_title" placeholder="Votre commentaire" name="idea_title">
											  <div class="invalid-feedback">
												Veuiller rentrer un commentaire
											  </div>
											
										  </div>
										  <div class="form-group">

											<div class="col-md-12">
											  <button type="submit" class="btn btn-outline-dark">Poster le commentaire</button>
											</div>
										  </div>
										</form>
									@endif
								</div>
								@if($user['type'] == 'employee')
									
									<a type="button" href="<!-- lien Bloquer image-->" class="btn btn-danger btn-lg col-md-12 btn-lg">Bloquer l'image</a>
									
								@elseif($user['type'] == 'BDE')
									<a type="button" href="<!-- lien supprimer image-->" class="btn btn-danger btn-lg col-md-12">Supprimer l'image</a>
								@endif
								</div>
								<div class="modal-footer row">
									
										@if(isset($user))
										<div class="col-md-1">
											<span class="like-picture" id="{{ $picture->picture_id }}">
												<i class="fas fa-thumbs-up"></i>
											</span>
										</div>
										@endif
										<div class="col-md-1">
											<small class="text-muted" id="number-{{ $picture->picture_id }}">{{ $picture->picture_number_like }} like</small>
										</div>
										<div class="col-md-3">
											<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
										</div>
									
								</div>
							  </div>
							</div>
						  </div>
						@endif
					@endforeach
				</div>
				<h2 class="col-md-12">Ajouter une photo</h2>
					@if(!isset($user))
						<div class="alert alert-danger">
							Vous devez être connecté pour poster une image !
						</div>
					@elseif(!$registered)
						<div class="alert alert-danger">
							Vous devez être inscrit à l'événement pour poster une image !
						</div>
					@else
						<form method="post" action="/events/picture/{{ $event->event_id }}" id="form_add_picture" enctype="multipart/form-data">
						  <div class="form-group col-md-12">
							  <div class="custom-file">
								<input type="file" class="custom-file-input" id="customFile" name="picture">
								<label class="custom-file-label" for="customFile">Choisissez une image</label>
							  </div>
						  </div>
						  <div class="form-group col-md-12">
							<label for="idea_title" class="col-form-label">Titre</label>
							
							  <input type="text" class="form-control" id="idea_title" placeholder="Titre de l'image" name="picture_title">
							  <div class="invalid-feedback">
								Veuillez rentrer le titre de l'image
							  </div>
							
						  </div>
						  <div class="form-group col-md-12">

							<label for="idea" class="col-form-label">Description</label>
							
							  <textarea class="form-control" id="idea" name="picture_desc" placeholder="Description de l'image"></textarea>
							  <div class="invalid-feedback">
								Veuillez rentrer la description de l'image
							  </div>
							
						  </div>
						  <div class="form-group">

							<div class="col-md-12">
							  <button type="submit" class="btn btn-outline-dark">Ajouter l'image</button>
							</div>
						  </div>
						</form>
					@endif
			</div>
			@if($user['type'] == 'employee')
				<a type="button" href="<!-- lien Bloquer event-->" class="btn btn-danger btn-lg col-md-12">Bloquer l'évènement</a>
			@elseif($user['type'] == 'BDE')
				<a type="button" href="<!-- lien supprimer event-->" class="btn btn-danger btn-lg col-md-12">Supprimer l'évènement</a>
			@endif
			</div>
		</div>

	@stop