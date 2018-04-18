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

	@else

	

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

	<pre>
		/**
		 * @todo
		 * changer le profil ?
		 */
	</pre>

	<h3 class="profil">Notifications</h3>

	<pre>
		/**
		 * @todo
		 * Datatables.js
		 * lien vers notification URL (ID)
		 * vérifier si ID <=> user
		 */
	</pre>

	<h3 class="profil">Inscriptions</h3>

	<h3 class="profil">Idées proposées</h3>

	<pre>
		/**
		 * @todo
		 */
	</pre>

	<h3 class="profil">Commentaires</h3>

	<pre>
		/**
		 * @todo
		 */
	</pre>

	

	<h2 class="profil">Achat</h2 >

	<h3 class="profil">Panier</h3>
		<div>
			
		</div>


	<h3 class="profil">Commandes</h3>

	<pre>
		/**
		 * @todo
		 */
	</pre>

	@stop