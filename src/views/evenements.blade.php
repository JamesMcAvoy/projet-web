@extends('template')

	@section('title')
		Evènements BDE Exia
	@stop
	
	@section('main_content')	

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
	@stop