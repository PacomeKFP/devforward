<?php
ignore_user_abort(true);
	if(!defined('DB_HOST'))define('DB_HOST', 'localhost');
	if(!defined('DB_NAME'))define('DB_NAME', 'boom');
	if(!defined('DB_USERNAME'))define('DB_USERNAME', 'root');
	if(!defined('DB_PASSWORD'))define('DB_PASSWORD', '');	

	try{
	
		$db = new PDO("mysql: host =".DB_HOST."; dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
		
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	
	}catch(PDOException $e){
	
		die('Erreur: '. $e->getMessage());
		
	}
?>
<?php
$pseudo = 'Pacome'
	if(isset($_POST['envoyer'], $_POST['text']) and trim($_POST['text'])!=''){
		extract($_POST);
		if($db->query("SELECT * FROM livre")->rowCount()==0){
				$id = 1;
			}else{
				$id = $db->query("SELECT * FROM livre")->rowCount()+1;
			}
			$ancien = $db->query("SELECT * FROM livre ORDER BY id DESC LIMIT 1")->fetch();
			if($ancien['pseudo']!=$pseudo and $ancien['message']!=$text){
				$db->query("INSERT INTO livre VALUES('$id', '$pseudo', '$text')");
			}
			$idMax = $id-1;
			$msgMax = 2;
		
	}
	if(isset($_GET['page'])){
		extract($_GET);
		$limInf = 2*$page;
		$reponse = $db->query("SELECT * FROM livre ORDER BY id DESC LIMIT $limInf, 2");
	}else{
		$reponse = $db->query("SELECT * FROM livre ORDER BY id DESC LIMIT 2");
	}
?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Livre d'or</title>
<script>
function livre(a){
	$("#center").load("functions/livre.php").fadeIn("Slow");
}
</script>
</head>

<body>
	<div id="livre">
		<form method="post">
			<input id="pseudo" name="pseudo" placeholder="Votre pseudonyme ici" required="required"><br>
			<textarea id="text" name="text" placeholder="Entrez votre texte ici..." required="required"></textarea>
			<input type="submit" name="envoyer" id="envoyer"> 
		</form>

		<?php 
			while($donnees=$reponse->fetch()){
		?>
				<div class="all">
				<div class="title"><?php echo $donnees['pseudo'] ?> <br></div >
				<div class="content"><?php echo $donnees['message'] ?><br></div >
				</div>
				<br>
		<?php } ?>
		</div>
		<div>
		<?php 
		$idMax = $db->query("SELECT * FROM livre")->rowCount();
		echo 'Total de messages postés: ' . $idMax.'<br>';
	$maxMsg=2;
				$nbrPages = ceil($idMax/$maxMsg);
						echo 'Page: ';
			for($i=0;$i< $nbrPages;$i++){
				echo '<span onclick="livre('.$i.')">'. $i. '</span> ';
			}

		?>
		</div>
	
</body>

</html>

