<?php
	if(isset($_GET['call'], $_GET['interlocuteur']) and $_GET['call']=='sendImage'){

	}else{
		echo "<script>alert('Attaque imminente via l\'URL '); location='../index.php'</script>";
				
	}
	
?>
<script>livre = 1</script>
<div>
	<h1>Envoyer des fichiers d'une taille maximum de 3 Mo</h1>
	<form method="post" enctype="multipart/form-data" action="functions/envoi.php">
		<div id="inputs"></div>
		<span onclick="add()" class="btn btn-primary btn-lg">Ajouter un fichier</span>&nbsp;<input type="submit" name="sendImage" id="sendImage" class="btn btn-lg btn-primary">
		<input type="hidden" id="MAX_FILE_SIZE" name="max" value="3150000">
		Nombre de fichiers <input type="number" id="nbr" name="nbr" value="" maxlength="3" disabled="disabled" class="form-control w1">
		<div id="view"></div>
	</form>
</div>
