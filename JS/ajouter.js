// Ceci est le fichier javascript qui rend notre application dynamique !

document.addEventListener('DOMContentLoaded', function () {
	
	function afficheFormulaire(){
		if(document.getElementById('formulaire').style.display == 'none'){
			document.getElementById('formulaire').style.display = 'inline';
			document.getElementById('afficherFormulaire').innerHTML = 'Masquer Le Formulaire';
		}else{
			document.getElementById('formulaire').style.display = 'none';
			document.getElementById('afficherFormulaire').innerHTML = 'Ajouter Une Plante A La Base De Données';
		}	
	}
	
	function ajouterPlante(){
		// ON RECUPERE LES DONNES QUI ONT ETEES RENTREES DANS LE FORMULAIRE ::
		var nom_plante = document.getElementById('nomPlante').value;
		var lieu = document.getElementById('lieu').value;
		var latitude = document.getElementById('latitude').value;
		var longitude = document.getElementById('longitude').value;
		var date_releve = document.getElementById('dateReleve').value;
		var photo = document.getElementById('urlPhoto').value;
		var nom_collecteur = document.getElementById('nomCol').value;
		var prenom_collecteur = document.getElementById('prenomCol').value;
		var commentaire = document.getElementById('commentaire').value;
		
		var request = new XMLHttpRequest();
		
		request.open("GET", "ajouter.php?nom_plante=" + nom_plante + "&lieu=" + lieu + "&latitude=" + latitude + "&longitude=" + longitude + "&date_releve=" + date_releve + "&photo=" + photo + "&nom_collecteur=" + nom_collecteur + "&prenom_collecteur=" + prenom_collecteur + "&commentaire=" + commentaire);
		request.send();	
		
		request.addEventListener('load', function(data){
			var reponse = data.target.responseText;
			
			if (reponse =='PlanteAjoutee'){
				console.log('La plante a été ajoutée');
			}else{
				if (reponse == 'ExisteDeja'){
					console.log('La plante existe déja');
				}else{
					console.log('Erreur');
				}
			}
		
		});
	}
	
	document.getElementById('afficherFormulaire').addEventListener('click',afficheFormulaire);
	document.getElementById('ajouter').addEventListener('click', function(evt) {
		evt.preventDefault(); // permet de ne pas actualiser la page lorque l'on clique sur le bouton de type "submit" d'id "ajouter"
		ajouterPlante();
	});
	
});
