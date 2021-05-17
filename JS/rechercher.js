// Ceci est le fichier javascript qui rend notre application dynamique !

document.addEventListener('DOMContentLoaded', function () { // Permet d'attendre que la page soit chargée pour exécuter le javascript, permet de placer ainsi ce script dans le <head> 

	function basesTableau(){ // Cette fonction renvoie le code_html (format CdC) décrivant la structure (nom des colones) du tableau que l'on affichera 
		var tab_html ='';
		tab_html += '<table>';
		tab_html += '<thead>';
		tab_html += '<tr>';
		tab_html += '<th>Photo</th>';
		tab_html += '<th class="colMasque" >ID Plante</th>';
		tab_html += '<th>Nom de la plante</th>';
		tab_html += '<th>Lieu</th>';
		tab_html += '<th class="colMasque" >Latitude</th>';
		tab_html += '<th class="colMasque" >Longitude</th>';
		tab_html += '<th class="colMasque" >Date du relevé</th>';
		tab_html += '<th>Le Collecteur</th>';
		tab_html += '<th>Nom col</th>';
		tab_html += '<th class="colMasque" >Commentaire</th>';
		tab_html += '<th></th>'; // LA COLONNE SUPPRIMER
		tab_html += '</tr></thead>';
		return tab_html;
	}
	
	function rechercher(){
		var motif = document.getElementById('motifRecherche').value;
		var request = new XMLHttpRequest(); // On prépare une requête
		
		request.open("GET", "get_tableau.php?motif=" + motif); // On précise que la requête sera envoyée à get_tableau.php
		request.send(); // On envoie la requête (a get_tableau.php)
			
		request.addEventListener('load', function(data){ // On définit ce que la fonction rechercher() fera lorsqu'elle aura reçu une réponse de la part de get_tableau.php
			var tab = JSON.parse(data.target.responseText); // Converti la chaine de Caractère au format JSON résulant de la requête (retournée par get_tableau.php) en un tableau associatif (dico)!
			var tab_html = basesTableau(); // On stocke dans la variable tab_html de le code html décrivant la structure du tableau que l'on souhaite afficher
				
			for(var numero in tab){ // On parcourt le dictionnaire "tab" (voir sa structure à l'adresse suivante : http://localhost/.../P/PHP/get_tableau.php)
				tab_html += '<tr>'; // On va écrire un ligne de notre tableau html
				tab_html += '<td> <img class= "imagetab" src="'; // La premiere colone du tableau html contient les photos des plantes
				tab_html += tab[numero]['photo'];
				tab_html += '"/> </td>';
				for(var cle in tab[numero]){ // Chaque tab[numero] est lui-même un tableau associatif contenant les informations (id, photo, nom, etc.) de la plante dont l'id est égat à numero+1
					if (cle != 'photo'){
						if ( (cle == 'id') || (cle =='latitude') || (cle =='longitude') || (cle=='date_releve') || (cle=='commentaire') ){
							tab_html +='<td class="colMasque">';
							tab_html += tab[numero][cle];
							tab_html +='</td>';
						}else{
							tab_html +='<td>';
							tab_html += tab[numero][cle];
							tab_html +='</td>';
						}
					}
				}
				var id=tab[numero]['id'];
				tab_html += '<td> <button onClick="supprimerPlante(' + id + ')" >supprimer</button></td>'; // On ajoute la colone contenant le bouton supprimer qui déclenche la fonction supprimerPlante(...) dans supprimer.js lorsque l'on clique dessus
				tab_html += '</tr>';
			}	
			
			tab_html += '</table>';
			document.querySelector('#tableauRecherche').innerHTML = tab_html; // On ajoute à la division dont l'id est 'tableauPlantes' (dans plantedyn.php) tous le code html de tab_html
		});
		
		document.getElementById("cacherTableau").style.display='inline'; // On affiche le boutton permettant de cacher le tableau que l'on vient de construire
		document.querySelector('#tableauRecherche').style.display='inline'; // On affiche le tableau que l'on vient de construire		
	}
	
	function cacherTableau(){
		document.getElementById("cacherTableau").style.display='none'; // On cache le bouton
		document.querySelector('#tableauRecherche').style.display='none'; // On cache le tableau
	}
	
	document.getElementById('Rechercher').addEventListener('click', rechercher); // Déclenche la fonction rechercher() lorsque l'on clique sur le bouton dont l'id est 'Rechercher'
	document.getElementById('cacherTableau').addEventListener('click', cacherTableau); // Déclence la fonction cacherTableau lorsque l'on clique sur le bouton dont l'id est 'cacherTableau'
	
});
