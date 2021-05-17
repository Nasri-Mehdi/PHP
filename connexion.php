<?php
	// Ceci est un webservice. Il vérifie que le login et mdp sont valides.

	session_start(); // On démarre une session
	$login=$_GET['login'];
	$mdp=$_GET['mot_de_passe'];
	$reponse=false;
	$donneesJson = file_get_contents('users.json'); // Récupère le contenu du fichier .json sous forme d'une chaine de caractères
	$liste = json_decode($donneesJson, true); // Transforme en tableau
	
	foreach($liste as $log=>$tab){
		if ($log == $login){
			if($tab['mot_de_passe'] == $mdp){
				$reponse=true;
			}
		}
	}
	
	if ($reponse == true){
		$_SESSION[$login] = 1; // 1 pour connecté, 0 pour déconnecté
		http_response_code(200); // On prévient que tout s'est bien passé et que c'est trop la fête
	}else{
		http_response_code(401);
	}
?>
