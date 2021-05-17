<?php
	// Ceci est un webservice. Il renvoie des données au format JSON
	header('Content-Type: application/json'); // Entête pour le type de contenu (JSON)
	
	function get_tableau($motif){
		include('bdd.php');
		$requete = 'SELECT * FROM releves';
		
		if ($motif != '') {
			$tabmotif = explode(' ', $motif); // Au cas où la recherche concerne plusieurs mots, on les sépare dans un tableau
			$taille = count($tabmotif); // donne la taille du tableau $tabmotif
			$j=0; // Ces deux lignes sont au cas où le premier caractère est un espace
			while($tabmotif == ''){
				$j++;
			}
			$requete = $requete . ' WHERE ((nom_plante LIKE \'%' . $tabmotif[$j] . '%\')
										OR (nom_collecteur LIKE \'%' . $tabmotif[$j] . '%\')
										OR (prenom_collecteur LIKE \'%' . $tabmotif[$j] . '%\')
										OR (commentaire LIKE \'%' . $tabmotif[$j] . '%\')
										OR (lieu LIKE \'%' . $tabmotif[$j] . '%\')
										OR (latitude LIKE \'%' . $tabmotif[$j] . '%\')
										OR (longitude LIKE \'%' . $tabmotif[$j] . '%\')
										OR (date_releve LIKE \'%' . $tabmotif[$j] . '%\')
										OR (id LIKE \'%' . $tabmotif[$j] . '%\')
										  )'; // On initialise la requête avec le premier mot de la recherche
			for($i=0; $i < $taille; $i++){ // On va poursuivre la construction de la requête en fonction des autres mots, on commence pour $i=0 au cas où la taille du tableau soit 1
				if ($i != $j){ // On a déja initialisé la requête
					if ($tabmotif[$i] != ''){ // Certaines cases du tableau peuvent contenir la chaine de caractère vide (si dans $motif il y a deux espaces consécutifs)
						$requete = $requete . ' AND ((nom_plante LIKE \'%' . $tabmotif[$i] . '%\')
												  OR (nom_collecteur LIKE \'%' . $tabmotif[$i] . '%\')
												  OR (prenom_collecteur LIKE \'%' . $tabmotif[$i] . '%\')
												  OR (commentaire LIKE \'%' . $tabmotif[$i] . '%\')
												  OR (lieu LIKE \'%' . $tabmotif[$i] . '%\')
												  OR (latitude LIKE \'%' . $tabmotif[$i] . '%\')
												  OR (longitude LIKE \'%' . $tabmotif[$i] . '%\')
												  OR (date_releve LIKE \'%' . $tabmotif[$i] . '%\')
												  OR (id LIKE \'%' . $tabmotif[$i] . '%\')
												    )';
					}
				}
			}			
		}
		
		$requete = $requete . ';'; // Optionnel, on ferme la requête	
		$base=connexionbd(); // On se connecte à la BDD
		$donnees = requete($base, $requete); // On récupere le tableau résultant de notre requête
		return $donnees; // On retourne le tableau
	}

	echo json_encode(get_tableau($_REQUEST["motif"])); // On affiche sous format jason notre tableau
	
	http_response_code(200); // On prévient que tout s'est bien passé et que c'est trop la fête
?>
