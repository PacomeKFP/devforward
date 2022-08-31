<?php require('../config/database.php');?>
<?php require('../includes/constants.php');?>
<script>livre = 1</script>
<?php

if(isset($_FILES['file'])){
global $db;
$user = $_COOKIE['user'];
$interlocuteur = $_COOKIE['interlocuteur'];
//print_r($_FILES['file']['name']['0']);
$a = count($_FILES['file']['name']);
		$taille = count($_FILES['file']['name']);
	$file=$_FILES['file'];
	for($i=0; $i<$taille; $i++){
		$maxsize = 1050000*3;
		$infosfichier= pathinfo($file['name'][$i]);
		$extension= strtolower($infosfichier['extension']);
		$extensions_autorisees=array('jpg', 'jpeg', 'gif', 'png', 'bmp','mp3', '3gp', 'wav', 'mp4','zip', 'iso', 'rar','pdf', 'docx', 'xls', 'exe', 'apk', 'xps', 'xltx', 'csv', 'doc','html', 'css', 'js', 'php', 'sql', 'psd');
		$extensions_type1 = array('jpg', 'jpeg', 'gif', 'png', 'bmp');

		if(!in_array($extension, $extensions_autorisees) or $file['error'][$i]>0 or $file['size'][$i]>$maxsize){
			echo "Erreur lors du transfert<br>";
		}else{
		if(in_array($extension, $extensions_type1)){
			$type='type1';
		}else{
			$type='type2';
		}
			$time = time(); 
			$structure = getcwd().'/tmp/messages/'.$time.$file['name'][$i];
			$structure = str_replace("\\", "/", $structure);
			$deplacement = move_uploaded_file($file['tmp_name'][$i], $structure);
			$ee = 'functions/tmp/messages/'.$time.$file['name'][$i];
			if($deplacement){
				$id = $db->query("SELECT * FROM message ORDER BY id DESC LIMIT 1");
			    $donnees=$id->fetch();
			    $id = $donnees['id']+1;
			    $nom = $file['name'][$i];
				$db->query("INSERT INTO fichiers VALUES('$id', '$user', '$interlocuteur', '$ee', '$type', '$time', '$nom')");
				$message = "Upload de l'image réussi";

			}else{
				$message = "Erreur lors de l'upload ";
				die($message);
			}
		}
	}
	
}
?>
<script>
	window.location="../index.php";
</script>




	
