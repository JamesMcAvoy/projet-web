@extends('template')

	@section('title')
		Profil
	@stop
	
	@section('main_content')

<div class="profilHeader">

	<h1>Profil</h1>
	<div></div>
	@if($user['type'] == 'BDE')

	<a class="button admin"  href="profil/admin">administration</a>

	@endif
</div>
	
	<h2 class="profil" >information du compte</h2 >

	<div class="container">
		<dl class="row">
			<dt class="col-sm-3"></dt>
			<dt class="col-sm-3">Nom</dt>
			<dd class="col-sm-6">{{ $user['name_user'] }}</dd>
			<dt class="col-sm-3"></dt>
			<dt class="col-sm-3">Prénom</dt>
			<dd class="col-sm-6">{{ $user['first_name'] }}</dd>
			<dt class="col-sm-3"></dt>
			<dt class="col-sm-3">Courriel</dt>
			<dd class="col-sm-6">{{ $user['email'] }}</dd>
			<dt class="col-sm-3"></dt>
			<dt class="col-sm-3">Grade</dt>
			<dd class="col-sm-6">{{ $user['type'] }}</dd>
		</dl>
	</div>

	<h3 class="profil">Notifications</h3>

	<h3 class="profil">Inscriptions</h3>
	@foreach($register as $registered)
		{{ $registered->event->event_title }}<br />
	@endforeach

	<h2 class="profil">Achats</h2 >

	<h3 class="profil" id="panier">Panier</h3>
		<p>Total : {{ $basket->basket_price }} € :</p>
		<p>
		@foreach($basket->contain as $contained)
			{{ $contained->item_number }} fois {{ $contained->item->item_name }}<br />
		@endforeach
		</p>

	<h3 class="profil">Commandes</h3>

	@stop