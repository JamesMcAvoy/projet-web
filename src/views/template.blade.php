<!DOCTYPE HTML>
<html>
<head>
	<link rel="icon" href="favicon.ico" />
	<meta charset="utf-8" />
    <meta name="description" content="bde" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css" />
</head>

<body>	
	<div class="container">
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark">
			  <a class="navbar-brand" href=""><img id="logo_exia" src="/img/exialogo.png" alt="Logo Exia"/></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
				  <li class="nav-item active">
					<a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item">

					<a class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    				Evènements
  					</a>
  					<div class="collapse" id="collapseExample">
  						<div class="row" class="card card-body">
   						 <a class="col-md-4 nav-link" href="/evenements">Les evènements</a>
   						 <a class="col-md-4 nav-link" href="/evenements">Boite à idées</a>
   						 <a class="col-md-4 nav-link" href="/evenements">Proposer vos idées</a>
 						 </div>
					</div>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="/boutique">Boutique</a>
				  </li>
				</ul>
					<a id="btn_connexion" href="/login" class="btn btn-outline-light btn-lg " role="button" aria-pressed="true">Connexion</a>
			  </div>
			</nav>	
		</header>
		<div id="vide_header"> </div>
		@yield('main_content')
	</div>
		<footer>
		<div class="container">
			<div class="row aligner">	
				<h6 class="col-md-4 col-sm-12">&copy; Copyright 2018</h6>
				<h6 class="col-md-4 col-sm-12">Projet WEB 2018 Exia Strasbourg</h6>
				<div class="col-md-4 col-sm-12">
					<a class="col-md-3" href="https://www.facebook.com/BdeExiaStrasbourg/"  target="_blank" ><img src="/img/facebook.png"  alt="facebook" height="50" width="50"></a>
				</div>
			</div>
		</div>
		</footer>
	
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="/js/main.js"></script>
</body>
</html>