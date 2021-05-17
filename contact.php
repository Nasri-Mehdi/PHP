<?php
	include('entete.php');
?>

	<form id="contact" method="post" action="traitement_formulaire.php">
		<fieldset>
    		<legend>Vos coordonnées</legend>
    		
    		<p>
    			<label for="nom">Nom :</label>
    			<input required  type="text" id="nom" name="nom" tabindex="1" />
    		</p>
    		
    		<p>
    			<label for="email">Email :</label>
    			<input required type="text" id="email" name="email" tabindex="2" />
    		</p>
    		
    		<p> Coisir une dresse mail:
	        	<select name="destinataire">
       				<option value="kherratazak@yahoo.fr">ZAK </option>
					<option value="nassim.bendjoudi@gmail.com">SICINOCHE </option>
					<option value="t.bondetti@live.fr">THIBAULT</option>
				</select>
			<p>
    		
    	</fieldset>
    		
    	<fieldset>
    		<legend>Objet de Votre message :</legend>
    	
    		<p>
    			<label for="objet">Objet :</label><input required  type="text" id="objet" name="objet" tabindex="3" />
    		</p>
    	
    		<p>
    			<label for="message">Message :</label>
    			<textarea id="message" name="message" tabindex="4" cols="30" rows="8"></textarea>
    		</p>
    	</fieldset>
     
    	<div style="text-align:center;"><input required  type="submit" name="envoi" value="Envoyer votre message" /></div>
    
    </form>';

<?php
	include('pied.html');
?>





