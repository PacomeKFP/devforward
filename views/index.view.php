<?php $title = 'Accueil'?><!-- Titre de la page -->
<?php include('includes/constants.php'); ?><!-- Nom du site -->
<?php include('partials/_header.php'); ?><!-- PArtie superieure-->

<div class="main-content" id="main">
	<div class="container">
		<div class="jumbotron">
			<h1><?php echo WEBSITE_NAME?> ?</h1>
			<p><?= WEBSITE_NAME?> est un réseau social conçu dans le but de fluidifier la communication <br>
			Et qui dit communication, sous entend causeries et partage !<br>
			Grace à cette plateforme,vous avez la possibilité de tisser des liens d'amitiés avec d'autres 
			utilisateurs, échanger des vidéos et correspondances et bien plus encore !
			<br>Alors n'hésitez plus et <a href="register.php">rejoignez dès maintenant
			la communauté Forward !</a><br></p>
			<a class="btn btn-primary btn-lg" href="register.php">Je m'inscris</a>  <a href="connexion.php" class="btn btn-primary btn-lg">Je me connecte</a>
		</div>
	</div>
</div>

<?php include('partials/_footer.php'); ?>