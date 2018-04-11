	
<!DOCTYPE HTML>
<html>
<head>
	<link rel="icon" href="favicon.ico" />
	<meta charset="utf-8" />
    <meta name="description" content="bde" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Site du BDE</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>	
	<div class="container">
		<header>
<<<<<<< HEAD
			<nav class="navbar navbar-expand-lg navbar-dark">
			  <a class="navbar-brand" href="#"><img id="logo_exia" src="/img/exialogo.png" alt="Logo Exia"/></a>
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
				  <li class="nav-item active">
					<a class="nav-link" href="http://localhost:8080/accueil">Accueil <span class="sr-only">(current)</span></a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="http://localhost:8080/evenements">Evènements</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="http://localhost:8080/boutique">Boutique</a>
				  </li>
				</ul>
					<a id="btn_connexion" href="#" class="btn btn-outline-light btn-lg " role="button" aria-pressed="true">Connexion</a>
			  </div>
			</nav>	
=======
		<div class="row">
			

			<img class="col-md-3 col-sm-12" src="/img/exia-logo.png" alt="Logo Exia" />

			<div class="col-md-6 col-sm-12">
				<nav>
					<ul class="row">
					<li class="col-md-4 col-sm-12">Accueil</li>
					<li class="col-md-4 col-sm-12">Evènements</li>
					<li class="col-md-4 col-sm-12">Boutique</li>
					</ul>
				</nav>
			</div>
				
			<div class="col-md-3 col-sm-12"><li>Inscription</li><div>
			
		</div>
>>>>>>> a620a18082570e877fcd1cdb6c708f4513e20ff8
		</header>
		<div id="vide_header"> </div>
		@yield('main_content')

		<footer>

		<p>copyright</p>
		<p>MathouDreamTeam</p>
		
		</footer>
	</div>
</body>
</html>