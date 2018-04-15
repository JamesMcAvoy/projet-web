@extends('template')

	@section('title')
		Profil
	@stop
	
	@section('main_content')

	<h1>Profil</h1>

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

	<h2>Notifications</h2>

	<pre>
		/**
		 * @todo
		 * Datatables.js
		 * lien vers notification URL (ID)
		 * vérifier si ID <=> user
		 */
	</pre>

	<h2>Idées proposées</h2>

	<pre>
		/**
		 * @todo
		 */
	</pre>

	<h2>Commentaires</h2>

	<pre>
		/**
		 * @todo
		 */
	</pre>

	<h2>Commandes</h2>

	<pre>
		/**
		 * @todo
		 */
	</pre>

	@stop