@extends('template')

	@section('title')
		Événements BDE Exia
	@stop
	
	@section('main_content')
	
	<div class="container">
		<div class="row">
			<img class="col-md-3 col-sm-12" id="image_event" src="{{$event_picture}}" alt="image évènement">
			<div class="row col-md-9 col-sm-12">
				<h2 class="col-md-8">{{$event_title}}</h2>
				<h3 class="col-md-4">{{$event_price}}</h3>
				<h3 class="col-md-6">{{$start_date}}</h3>
				@if
				<h3 class="col-md-6">Tous les {{$time_between_each}}</h3>
				@endif
			</div>
			<p class="col-md-12">{{$event}}</p>
			<h2 class="col-md-12">Photos</h2>
			
			<div class="col-md-12">
				@foreach($pictures as $thisPicture)
				<img data-toggle="modal" data-target="#{{$thisPicture->$picture_title}}" src="{{$thisPicture->$picture}}" alt="{{$thisPicture->$picture_title}}" class="col-lg-3 col-md-4 col-sm-6">

				  <div class="modal fade" id="{{$thisPicture->$picture_title}}" role="dialog">
					<div class="modal-dialog modal-lg">
					  <div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
						  <h4 class="modal-title">{{$thisPicture->$picture_title}} {{$thisPicture->$picture_date}}</</h4>
						</div>
						<div class="modal-body">
						  <img src="{{$thisPicture->$picture}}" alt="{{$thisPicture->$picture_title}}">
						  <p>{{$thisPicture->picture_desc}}</p>
						  <!-- espace commentaire -->
						</div>
						<div class="modal-footer">
							<div class="row">
								<div class="col-md-4">
									<span class="like" id="{{ $idea->idea_id }}">
										<i class="fas fa-thumbs-up"></i>
									</span>
								</div>
								<div class="col-md-4">
									<small class="text-muted">{{ $thisPicture->picture_number_like }}</small>
								</div>
								<div class="col-md-4">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
								</div>
							</div>
						</div>
					  </div>
					</div>
				  </div>
				
				
				@endforeach
			</div>
		</div>
	</div>
	
	@stop