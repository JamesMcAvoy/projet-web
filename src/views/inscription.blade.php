<!DOCTYPE HTML>
<html>
<head>
	<title>Inscription</title>
	<meta charset="utf-8">
</head>
<body>
		<form action="/register" method="post" id="form_contact">
				<div>
					<label for="nom">Nom :</label>
					<input type="text" id="nom" placeholder="Nom" name="nom"/>
				</div>
				<div>
					<label for="prenom">Prénom :</label>
					<input type="text" id="prenom" placeholder="prénom" name="prenom"/>
				</div>
				<div>
					<label for="courriel">Courriel :</label>
					<input type="email" id="courriel" placeholder="Courriel" name="courriel"/>
				</div>
				<div>
					<label for="mdp">Mot de passe :</label>
					<input type="password" id="mdp" placeholder="Mot de Passe" name="mdp"></textarea>
				</div>
				<div id="div_bouton_envoyer">
					<input id="bouton_envoyer" type="submit" value="Inscription">
				</div>
			</form>
</body>
</html>