<?php
	include('entete.php');
	
	include('bdd.php');
	
	vidage_table(); // On nétoie la table afin de ne pas rajouter à chaque connexion plusieurs fois les mêmes plantes
	
	echo "Nous allons créer la table :";
	creation_table();
	insertion_exemples();
	
	echo '<p>Binvenue dans votre espace Binvenue dans votre espace Binvenue dans votre espace Binvenue dans votre espace Binvenue dans votre espace Binvenue dans votre espace Binvenue dans votre espace Binvenue dans votre espace Binvenue dans votre espace Binvenue dans votre espace Binvenue dans votre espace Binvenue dans votre espace </p>';

	include('pied.html');
?>
