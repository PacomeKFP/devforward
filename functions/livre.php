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
?><?php
if(defined('USER_PSEUDO'))
	$pseudo = USER_PSEUDO;
else{
	$pseudo=$_COOKIE['user'];
}

	if(isset($_POST['envoyer'], $_POST['texte']) and trim($_POST['texte'])!=''){
		extract($_POST);
		if($db->query("SELECT * FROM livre")->rowCount()==0){
				$id = 0;
		}else{
			$id = $db->query("SELECT * FROM livre")->rowCount()+1;
		}
		$ancien = $db->query("SELECT * FROM livre ORDER BY id DESC LIMIT 1")->fetch();
		if($ancien['message']!=$texte){
			$db->query("INSERT INTO livre VALUES('$id', '$pseudo', '$texte')");
		}
		$idMax = $id-1;
		$msgMax = 20;
		
	}
	if(isset($_GET['page'])){
		extract($_GET);
		$msgMax = 20;
		$limInf = $msgMax*$page;
		$reponse = $db->query("SELECT * FROM livre ORDER BY id DESC LIMIT $limInf, $msgMax");
	}else{
	$msgMax = 20;
		$reponse = $db->query("SELECT * FROM livre ORDER BY id DESC LIMIT $msgMax");
	}
?>
<script>
function livrea(a){
	$("#center").load("functions/livre.php?page="+a).fadeIn("Slow");
}
</script>
<div id="livre">
<h2 class="text-primary text-center">Que pensez vous de Dev Forward ?</h2>
<div id="livre">
	<form method="post">
		<textarea id="texte" name="texte"  required="required" class="form-control texte"></textarea>
		<input id="envoyer" class="btn btn-primary" name="envoyer" type="submit" value="Poster">
	</form>
	<div id="tchat">
	<?php 
			while($donnees=$reponse->fetch()){
		?>
	<div class="all-a">
		<div class="title">
			<?php echo $donnees['pseudo'] ?><br></div>
		<div class="content">
			<?php echo $donnees['message'] ?><br></div>
	</div>
	<br><?php } ?>
	</div>
<div>
	<?php 
		$idMax = $db->query("SELECT * FROM livre")->rowCount();
		echo '<span class="nbr-msg-poste">Total de messages postés: ' . $idMax.'</span><br>';
		$msgMax = 20;
				$nbrPages = ceil($idMax/$msgMax);
						echo 'Page: ';
			for($i=0;$i< $nbrPages;$i++){
				echo '<span class="page" onclick="livrea('.$i.')">'. $i. '</span> ';
			}

		?></div>
</div>
