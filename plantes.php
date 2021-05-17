<?php	
	include('entete.php');
	include('bdd.php');

	echo ('
		<table>
			<thead>
				<tr>	
					<th>Photo</th>
					<th>ID Plante</th>
					<th>Nom de la plante</th>
					<th>Lieu</th>
					<th>Latitude</th>
					<th>Longitude</th>
					<th>Date du relevé</th>
					<th>Le Collecteur</th>
					<th>Nom col</th>
					<th>Commentaire</th>
				</tr>
			</thead>');
			
	$requete="SELECT * FROM releves";
	$base=connexionbd();
	$donnees = requete($base,$requete);

	for($i=0; $i < count($donnees) ; $i++){
		echo('<tr>');
		echo('<td><img class="imagetab" src="' . $donnees[$i]['photo'] . '"/></td>');
		foreach($donnees[$i] as $cle => $val ){
			if ($cle != 'photo'){
				echo('<td>'. $val . '</td>');
			}
		}
		echo('</tr>');
	}
	
	echo('</table>');
	
	include('pied.html');
?>
