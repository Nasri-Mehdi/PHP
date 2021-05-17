// Ceci est le fichier javascript qui rend notre application dynamique !

function supprimerPlante(id){
		var request = new XMLHttpRequest();
		/* request.addEventListener('load', function(data){
			// là on est sûr que le service a fini son travail
			rechercher();
		};*/
		request.open("GET", "supprimer.php?identifient=" + id);
		request.send();
		
}
