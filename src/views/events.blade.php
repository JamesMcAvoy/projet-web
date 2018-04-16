@extends('template')

	@section('title')
		Événements BDE Exia
	@stop
	
	@section('main_content')
	
	<div id="marge_inutile">
		
	</div>
	<div>
		<h1 id="events">Événements BDE Exia</h1>
	
		@foreach($eventUp as $thisEvent)
		
			<div class="container jumbotron jumbotron-fluid">
				<div class="row">
					<img src="{{event_picture}}" class="col-md-3 col-sm-6" alt="image évènement"> 
					<div class="col-md-9 col-sm-12">
						<div class="row">
							<h2 class="col-md-9 col-sm-12">{{$thisEvent->$event_title}}</h2>
							<h2 class="col-md-3 col-sm-12">{{$thisEvent->$event_price}}</h2>
							<h3 class="col-md-4 col-sm-12">{{$thisEvent->$start_date}}</h3>
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
			</div>
		
		@endforeach
	</div>
	<h1 id="ideas">Boîte à idées</h1>
	<p>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br>a<br></p>
	<h1 id="form">Proposer une idée</h1>
	@if(isset($user))

	@else
		<div class="alert alert-danger">
			Vous devez être connecté pour proposer une idée !
		</div>
	@endif
	
	<script>
	$('.bouton_event').click(function() {
			scrollTo($(this).attr('href').substring(1));
		});
	</script>
	
	@stop