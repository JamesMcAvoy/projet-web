@extends('template')

	@section('title')
		{{ $event->event_title }}
	@stop
	
	@section('main_content')
	
	<div class="container">
		<div class="row">
			<a type="button" href="/events" class="btn btn-secondary btn-lg btn-block col-md-12 retour_accueil">Retour à l'accueil</a>
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
					<a type="button" href="<!--lien vers inscription-->" class="btn btn-success col-md-6">S'inscrire</a>
				@endif
				<div class="col-md-12">
					<a type="button" href="<!--lien vers inscription-->" class="btn btn-success"><h3>S'inscrire</h3></a>
				</div>
			</div>
			<h2 class="col-md-12">Description</h2>
			<p class="col-md-12 event_desc">{{$event->event}}</p>
			<h2 class="col-md-12">Photos</h2>
			
			<div class="col-md-12">
				@foreach($event->picture->sortByDesc('picture_number_like') as $picture)
					@if($picture->picture_state == 'valid')
					<img data-toggle="modal" data-target="#pic-{{ $picture->picture_id }}" src="/picture/{{ $picture->picture_id }}" alt="{{ $picture->picture_title }}" class="col-lg-3 col-md-4 col-sm-6">

					  <div class="modal fade" id="pic-{{ $picture->picture_id }}" role="dialog">
						<div class="modal-dialog modal-lg">
						  <div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title">{{ $picture->picture_title }}, posté le {{ date('j/m à H:i:s', strtotime($picture->picture_date)) }} par {{ $picture->user->name_user }} {{ $picture->user->first_name }}</h4>
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<div class="modal-body">
							  <img src="/picture/{{ $picture->picture_id }}" alt="{{ $picture->$picture_title }}">
							  <p>
								{{ $picture->picture_desc }}
							  </p>
							@if(!isset($user))
								<div class="alert alert-danger">
									Vous devez être connecté pour poster une image ou un commentaire !
								</div>
							@else
							<!-- POST -->
							@endif
							</div>
							<div class="modal-footer">
								<div class="row">
									<div class="col-md-4">
										<span class="like-picture" id="{{ $picture->picture_id }}">
											<i class="fas fa-thumbs-up"></i>
										</span>
									</div>
									<div class="col-md-4">
										<small class="text-muted" id="number-{{ $picture->picture_id }}">{{ $picture->picture_number_like }}</small>
									</div>
									<div class="col-md-4">
										<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
									</div>
								</div>
							</div>
						  </div>
						</div>
					  </div>
					@endif
				@endforeach
			</div>
			<h2 class="col-md-12">Ajouter une photo</h2>
				<form method="post" action="<!--lien ajout photo-->" id="form_add_picture">
				  <div class="form-group col-md-12">
					  <div class="custom-file">
						<input type="file" class="custom-file-input" id="customFile">
						<label class="custom-file-label" for="customFile">Choisissez une image</label>
					  </div>
				  </div>
				  <div class="form-group col-md-12">
					<label for="idea_title" class="col-form-label">Titre</label>
					
					  <input type="text" class="form-control" id="idea_title" placeholder="Titre de l'image" name="idea_title">
					  <div class="invalid-feedback">
						Veuillez rentrer le titre de l'image
					  </div>
					
				  </div>
				  <div class="form-group col-md-12">

					<label for="idea" class="col-form-label">Description</label>
					
					  <textarea class="form-control" id="idea" name="idea" placeholder="Description de l'image"></textarea>
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
			</div>
		</div>
	
	@stop