<?php
	include('entete.php');
?>

			<script src="JS/rechercher.js"></script>
			<script src="JS/ajouter.js"></script>
			<script type="text/javascript" src="JS/supprimer.js"></script>
			
			
			<div id="gauche" class="form-group">
				<p>...Vous cherchez une plante?</p>
				<button id="Rechercher">Lancer la recherche</button>
			
				<input type="text" id="motifRecherche" class="form-control" rows="1" id="msg" name="msg" placeholder="Vous recherchez une plante?">
				</br>
			</div>
		
			
			
			<div id="droite">
				<p>...Vous êtes collecteur?</p>
				<button id="afficherFormulaire">Ajouter Une Plante A La Base De Données
				</button>
				</br>
			</div>
			</br>
			
			<div id="fenetreRajout">		
				<form id ="formulaire" style="display:none;">
					<p>Veuillez insérer les informations concernant votre plante et cliquer sur ajouter pour sauvegarder votre relevé.</p>
					<input type="text" id ="nomPlante" placeholder="Plante" size="13" maxlength="30" required />
					<input type="text" id="lieu" placeholder="Lieu.Ex: dans mon jardin.." size="13" maxlength="15" required />
					<input type="number" step="0.00001" id="latitude" placeholder="Latitude" size="13" required />
					<input type="number" step="0.00001" id="longitude" placeholder="Longitude" size="13" required />
					<input type="date" id="dateReleve" placeholder="Date jj/mm/aa" size="13" required />
					<input type="text" id="urlPhoto" placeholder="URL de la photo" size="13" maxlength="255" required />
					<input type="text" id="nomCol" placeholder="Nom du collecteur" size="13" maxlength="20" required />
					<input type="text" id="prenomCol" placeholder="Prénom du collecteur" size="13" maxlength="20" required />
					<input type="text" id="commentaire" placeholder="des commentaires? ..." size="72" maxlength="400"/>
					<input type="submit" id ="ajouter" value="Ajouter">
				</form>
			</div>
			</br>
			
			<div id="tableauRecherche"></div>
			
			<button id="cacherTableau" style='display:none' >Masquer Les Données</button>

<?php	
	include('pied.html');
?>
