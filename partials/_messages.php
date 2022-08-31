<?php require('../config/database.php');?>
<?php require('../includes/constants.php');?>
<script>
	function message(user){
		$('#center').load("functions/messages.php?apel=discuss&type=pseudo&pseudo="+user).fadeIn("Slow");
	}
</script>
<?php
$user = $_COOKIE['user'];
global $db;
$messages = $db->query("SELECT * FROM message WHERE destinataire = '$user' AND vu = 0 ORDER BY temps DESC");
while($donnees=$messages->fetch()){
	extract($donnees);
	
			$datez = $temps;
            $mois = date("F", "$datez");
            $jour = date('d',"$datez");
            $annee = date('Y', "$datez");
            $heure = date('H', "$datez");
            $minute = date('i', "$datez");


            $temp = $jour.' '. translate("$mois") . ' ' .$annee. ' à ' . $heure . ':'.$minute;

	
	$db->query("UPDATE message SET vu = 1 WHERE destinateur = '$destinateur' AND destinataire = '$user'");
	$divc = '</div>';
	$divman='<div class="msg-manque" onclick="message('."'".$destinateur."'".')">';
	$divpseudo = '<div class="msg-man-pseudo">';
	$divtext = '<div class="msg-man-text">';
	$divtime = '<div class="msg-man-date">';
	
	$content = $divman.$divpseudo. $destinateur .$divc.$divtext. $message .$divc.$divtime. $temp .$divc.$divc;
	echo $content;
}

