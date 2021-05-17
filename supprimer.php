<?php
	// Ceci est un webservice. Il ajoute des données entrées en URL à la base de données
	// demarrer la session
	include('bdd.php');
	$maBd = connexionbd();
	// verifier que la persone est loggéé
	
	$maRequeteInsertion = 'DELETE FROM releves WHERE id=' . $_GET['identifient'];
	$requete = requete($maBd, $maRequeteInsertion);
	
	http_response_code(200); // On prévient que tout s'est bien passé et que c'est trop la fête	
	//401 non connecté
?> 
