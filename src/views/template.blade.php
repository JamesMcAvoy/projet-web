<!DOCTYPE HTML>
<html>
<head>
	<link rel="icon" href="favicon.png" />
	<meta charset="utf-8" />
    <meta name="description" content="bde" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="/css/style.css" />
</head>

<body>	
	<div class="container">
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark">
			  <a class="navbar-brand" href="/">
			  	<img id="logo_exia" src="/img/exialogo.png" alt="Logo Exia"/>
			  	<img class="logo-bde-header" src="/img/logo-home.png" alt="Logo BDE"/>
			  </a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
				  <li class="nav-item{{ (isset($route) && $route == 'accueil') ? ' active' : '' }}">
					<a class="nav-link" href="/">Accueil</a>
				  </li>
				  <li id="events" class="nav-item{{ (isset($route) && $route == 'events') ? ' active' : '' }}">

					<a class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    				Événements
  					</a>
  					<div class="collapse" id="collapseExample">
  						<div class="row card-body">
   						 <a id="bouton_events" class="col-md-4 nav-link" href="/events#events">Événements</a>
   						 <a id="bouton_ideas" class="col-md-4 nav-link" href="/events#ideas">Boite à idées</a>
   						 <a id="bouton_form" class="col-md-4 nav-link" href="/events#form">Proposer vos idées</a>
 						 </div>
					</div>
				  </li>
				  <li class="nav-item{{ (isset($route) && $route == 'shop') ? ' active' : '' }}">
					<a class="nav-link" href="/shop">Boutique</a>
				  </li>
				  @if(isset($user))
				  <li class="nav-item{{ (isset($route) && $route == 'profil') ? ' active' : '' }}">
					<a class="nav-link" href="/profil">Profil</a>
				  </li>
				  @endif
				</ul>
				@if(isset($user))
					<a id="btn_connexion" href="/logout?token={{ $user['token'] }}" class="btn btn-outline-light btn-lg " role="button" aria-pressed="true">Déconnexion</a>
				@else
					<a id="btn_connexion" href="/login" class="btn btn-outline-light btn-lg " role="button" aria-pressed="true">Connexion</a>
				@endif
			  </div>
			</nav>	
		</header>
			<div id="vide_header"> </div>
		<div class="main-content">
			@yield('main_content')
		</div>
	</div>
		<footer>
		<div class="container">
			<div class="row aligner">
				<h6 class="col-md-3 col-sm-12">&copy; Copyright 2018</h6>
				<h6 class="col-md-4 col-sm-12">Projet WEB 2018 Exia Strasbourg</h6>
				<a class="col-md-4 col-sm-12 " href="" data-toggle="modal" data-target="#equipe"><h6>Concepteur du site</h6></a>
				<div class="col-md-1 col-sm-12">
					<a class="col-md-3" href="https://www.facebook.com/BdeExiaStrasbourg/"  target="_blank" ><img src="/img/facebook.png"  alt="facebook" height="50" width="50"></a>
				</div>
			</div>
		</div>
		</footer>
		
		  <div class="modal fade" id="equipe" role="dialog">
			<div class="modal-dialog modal-lg">
			  <div class="modal-content">
				<div class="modal-header">
				  <h4 class="modal-title">Concepteurs du site</h4>
				  <button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="membre_equipe col-md-3 col-sm-6">
							<img src="/img/equipe/brisset.jpg" class="img_membre" alt="">
							<h5>Mathieu BRISSET</h5>
							<h6>Back-end (intégration)</h6>
						</div>
						<div class="membre_equipe col-md-3 col-sm-6">
							<img src="/img/equipe/vernet.jpg" class="img_membre" alt="">
							<h5>Louis VERNET</h5>
							<h6>Back-end (bases de donnée)</h6>
						</div>
						<div class="membre_equipe col-md-3 col-sm-6">
							<img src="/img/equipe/buet.jpg" class="img_membre" alt="">
							<h5>Thomas BUET</h5>
							<h6>Front-end</h6>
						</div>
						<div class="membre_equipe col-md-3 col-sm-6">
							<img src="/img/equipe/pansera.jpg" class="img_membre" alt="">
							<h5>Vincent PANSERA</h5>
							<h6>Chef de projet et Front-end</h6>
						</div>
					</div>
				</div>
				<div class="modal-footer">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			  </div>
			</div>
		  </div>
	

	<script src="https://code.jquery.com/jquery-3.3.1.min.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
	<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="/js/main.js"></script>
</body>
</html>