<!doctype html>

<html>
	<head>
		<html lang="fr">
		
		<meta charset="UTF-8">
		<meta name="robots" content="index,follow" />
		
		<title>NZT Plantes</title>
		<link rel="stylesheet" type="text/css" href="CSS/stylepage.css">
		<script src="JS/connexion.js"></script>
	</head>

	<body>
	
	<div id="entete">
		<div id="logo">		
			<img src="IMG/LOGO.jpg"/>
		</div>
		
		</br>
		
		<h1>NZT PLANTES</h1>
		
		<form id="formConnexion" style="display:none">
			<fieldset>
				<legend>Connexion</legend>
				<label>login : </label>
				<input id="login" type="text" required placeholder="votre login"/>
				<label>mot de passe :</label>
				<input id="motDePasse" type="password" required placeholder="mot de passe"/>
				<button id="validerConnexion">&#10004;</button>
			</fieldset>
		</form>
		
		<div id="erreurConnexion" style="display:none">
			Login ou mot de passe incorrect.
		</div>			
	</div>


	<nav>
		<ul>
			<li class="menu-home"><a href="index.php">Accueil</a></li>
			<li class="menu-plantes"><a href="plantes.php">Plantes</a></li>
			<li class="menu-plantesDyn"><a href="plantesDyn.php">Rechercher une plante</a></li>
			<li class="menu-contact"><a href="contact.php">Contact</a></li>
			<li class="menu-newusr"><a href="signUp.php">SignUp</a></li>
			<li id="connexion" class="menu-cnx"><a href="#">Login</a></li>
			<li id="deconnexion" class="menu-cnx" style="display:none"><a href="#">Logout</a></li>
		</ul>
	</nav>
	
	<div class="corps">

	
	
