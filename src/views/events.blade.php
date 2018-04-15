@extends('template')

	@section('title')
		Événements BDE Exia
	@stop
	
	@section('main_content')

	<h1 id="events">Événements BDE Exia</h1>
	<h1 id="ideas">Boîte à idées</h1>
	<h1 id="form">Proposer une idée</h1>
	@if(isset($user))

	@else
		<div class="alert alert-danger">
			Vous devez être connecté pour proposer une idée !
		</div>
	@endif

	@stop