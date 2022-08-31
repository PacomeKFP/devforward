<script>
    function modifier() {
        $("#idds").load("modifierprofil.php?");
    }
    function fichier(){
    	$("#photo").trigger("click");
    	$("#fichier").html("&check;");
    	document.getElementById("photo").className="form-control auto";
    }
</script>
<script>livre = 1</script>
<div class="completer-profil">
	<h1 class="text-muted profil-tete">Compléter mon profil</h1>
	<div class="profil-corp">
		<form action="functions/profilsend.php" class="form-profile" method="post" enctype="multipart/form-data">
			<div class="profil-gauche">
				<label class="text-success text-justify" for="pseudo">Pseudonyme</label>
				<input id="pseudo" class="form-control" name="pseudo" type="text">
				<label class="text-success text-justify" for="ville">Ville</label>
				<input id="ville" class="form-control" name="ville" type="text">
				<label class="text-success text-justify" for="telephone">Téléphone</label>
				<input id="telephone" class="form-control" name="telephone" type="tel">
			</div>
			<div class="profil-droite">
				<label class="text-success" for="emploi">Disponible pour emploi</label>
				<!--<input id="emploi" class="check form-control" name="emploi" type="checkbox">  -->
				<select id="emploi" class="form-control" name="emploi" spellcheck="true">
					<option value="Disponible pour un emploi">Oui</option>
					<option value="Indisponible pour un emploi">Non</option>
				</select>
				<label class="text-success text-justify" for="pays">Pays</label>
				<input id="pays" class="form-control" name="pays" type="text">
				<label class="text-success text-justify" for="mail">Adresse Email</label>
				<input id="mail" class="form-control" name="mail" type="email">
			</div>
			<br><label class="text-success text-justify" for="biographie">Biographie</label>
			<textarea id="biographie" class="form-control biographie" cols="5" name="biographie" rows="5"></textarea>
			<br>
			<label class="text-success text-justify" id="tel" for="telephone">Photo de profil</label>
			<input id="photo" class="form-control invisible" name="photo" type="file">
			<div id="fichier" onclick="fichier()" class="btn btn-primary">&cross;</div>
			<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
			
			
			
			
			<input id="valider" class="btn btn-lg btn-primary" name="valider" type="submit" value="Valider">
			<br><br>
		</form>
	</div>
</div>

    
    


