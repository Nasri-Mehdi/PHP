<?php
	// Ceci est un webservice. Il ajoute des données entrées en URL à la base de données
	
	include('bdd.php');
	
	$maBd = connexionbd();
	$baseEntiere = requete($maBd, "SELECT * FROM releves");
	$reponse = 0; // VARIABLE QUI NOUS SERVIRA A SAVOIR SI OUI OU NON LA PLANTE QUE L'ON VEUT AJOUTER EST DEJA PRESENTE DANS LA BASE DE DONNES
	$nomPlante = $_GET['nom_plante']; // CORRESPOND AU NOM DE LA PLANTE QUE L'ON VEUT AJOUTER DANS LA BASE DE DONNEE
	
	for($i=0; $i < count($baseEntiere); $i++){
		if ($baseEntiere[$i]['nom_plante'] == $nomPlante){ // ON TESTE SI LE NOM DE LA PLANTE QUE L'ON VEUT AJOUTER SE TROUVE DEJA DANS LA BASE DE DONNEES
		$reponse = -1;
		}
	}
	
	if ($reponse == 0){ // SI LA PLANTE EST "NOUVELLE" :
		$maRequeteInsertion = 'INSERT INTO releves VALUES ' 
			. '(DEFAULT, \''
			. $nomPlante
			. '\', \''
			. $_GET['lieu']
			. '\', \''
			. $_GET['latitude']
			. '\', \''
			. $_GET['longitude']
			. '\', \''
			. $_GET['date_releve']
			. '\', \''
			. $_GET['photo']
			. '\', \''
			. $_GET['nom_collecteur']
			. '\', \''
			. $_GET['prenom_collecteur']
			. '\', \''
			. $_GET['commentaire']
			. '\');'
			; // LA REQUETE SERA DAJOUTER LA NOUVELLE PLANTE AVEC TOUTES SES INFOS
		$insertion = requete($maBd, $maRequeteInsertion);
		echo('PlanteAjoutee'); // ON AFFICHE (retourne/signale) QUE LA PLANTE A BIEN ETE AJOUTEE DANS LA BASE DE DONNEES
	}else{
		echo('ExisteDeja'); // ON AFFICHE (retourne/signale) QUE LA PLANTE ETAIT DAJA PRESENTE DANS LA BASE DE DONNEES
	}
	
	http_response_code(200); // On prévient que tout s'est bien passé et que c'est trop la fête
	
?>


