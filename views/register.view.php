<?php $title = 'Inscription'?><!-- Titre de la page -->
<?php include('partials/_header.php'); ?><!-- Partie superieure-->

<div class="main-content" id="main">
	<div class="container">
	
		<h1>Devenez dès à  présent membre!</h1>
		
		<?php include('partials/_errors.php');//regler les Ã©rreurs ?>
		
		<form method="post" class="well col-md-5">
		
			<!-- Name fields-->
		<div class="form-group">
			<label class="control-label" for="name">Nom: </label>
			<input type="text" class="form-control" id="name" name="name" required="required">
		</div>
		
			<!-- surname fields-->
		<div class="form-group">
			<label class="control-label" for="prenom">Prenom: </label>
			<input type="text" class="form-control" id="prenom" name="prenom" required="required">
		</div>

		
			<!-- Pseudo fields-->
		<div class="form-group">
			<label class="control-label" for="pseudo">Pseudonyme: </label>
			<input type="text" class="form-control" id="pseudo" name="pseudo" required="required">
		</div>
		
			<!-- Email fields-->
		<div class="form-group">
			<label class="control-label" for="email">Adresse Email: </label>
			<input type="email" class="form-control" id="email" name="email" required="required">
		</div>
		
		
			<!-- Password fields-->
		<div class="form-group">
			<label class="control-label" for="password">Mot de passe: </label>
			<input type="password" class="form-control" id="password" name="password" required="required">
		</div>
		
			<!-- Password Confirmation fields-->
		<div class="form-group">
			<label class="control-label" for="password_confirm">Confirmer votre mot de passe: </label>
			<input type="password" class="form-control" id="password_confirm" name="password_confirm" required="required">
		</div>
		
					<!-- Born date fields-->
		<div class="form-group">
			<label class="control-label" for="date">Date de naissance: </label>
			<input type="date" class="form-control" id="date" name="date" required="required">
		</div>
		
					<!-- Sex fields-->
		<div class="form-group">
			<label class="control-label" for="email">Sexe: </label><br>
			Masculin <input name="sexe" value="Homme" type="radio" checked="checked">  Feminin <input name="sexe" value="Femme" type="radio">
		</div>

					<!-- Description fields-->
		<!-- <div class="form-group">
			<label class="control-label" for="description">Donnez votre description: </label><br>
			<textarea name="description" rows="5" maxlength="255" class="form-control" id="description"></textarea>
		</div> -->
		
		<a  ><input type="submit" class="btn btn-primary" value="Inscription" name="register" onclick="register()"></a>
		
		
		
		</form>
	
	</div>
	
</div>

<?php include('partials/_footer.php'); ?>











