// Ceci est le fichier javascript qui rend notre application dynamique !

document.addEventListener('DOMContentLoaded', function () {
	
	function afficheConnexion(){ // Permet d'afficher le formulaire de connexion
		document.getElementById('formConnexion').style.display = 'inline';
	}
	
	function authentification(){
		var login = document.getElementById('login').value;
		var mdp = document.getElementById('motDePasse').value;		
		var request = new XMLHttpRequest();
		
		request.addEventListener('load', function(data){
			var reponse = data.target.status;
			if (reponse == 200){ // Si on a reçu le code annonçant que login et mdp sont ok 
				document.getElementById('formConnexion').style.display = 'none';
				document.getElementById('deconnexion').style.display = 'inline';
				document.getElementById('connexion').style.display='none';	
			}else{
				document.getElementById('erreurConnexion').style.display = 'inline';
			}
		});
		
		request.open("GET", "connexion.php?login=" + login + "&mot_de_passe=" + mdp);
		request.send();
	}
	
	document.getElementById('connexion').addEventListener('click',afficheConnexion);
	document.getElementById('validerConnexion').addEventListener('click', function(evt) {
		evt.preventDefault();
		authentification();
	});
});
