<?php $title = 'Connexion'?><!-- Titre de la page -->
<?php include('partials/_header.php'); ?><!-- PArtie superieure-->

<div class="main-content" id="main">
	<div class="container">
	
		<h1>Connectez vous dès lors!</h1>
		
		<?php include('partials/_errors.php');//regler les Ã©rreurs ?>
		
		<form method="post" class="well col-md-5">
		<div id="obj">
			<!-- Pseudo fields-->
		<div class="form-group">
			<label class="control-label" for="pseudo">Pseudonyme: </label>
			<input type="text" class="form-control" id="pseudo" name="pseudo" onkeyup="verifier(3, $('#pseudo'))" required="required">
		</div>
		
			<!-- Email fields-->
		<div class="form-group">
			<label class="control-label" for="email">Adresse Email: </label>
			<input type="email" class="form-control" id="email" name="email" required="required">
		</div>
		
		
			<!-- Password fields-->
		<div class="form-group">
			<label class="control-label" for="password">Mot de passe: </label>
			<input type="password" class="form-control" id="password" name="password" onkeyup="verifier(6, $('#password'))" required="required">
		</div>


		<input type="submit" class="btn btn-primary" value="Connexion" name="connect">

		
</div>
		
		</form>
	
	</div>
	
</div>

<?php include('partials/_footer.php'); ?>