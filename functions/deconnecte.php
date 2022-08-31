<?php require('../config/database.php');?>
<?php require('../includes/constants.php');?>

<?php

global $db;
$user = $_COOKIE['user'];
$db->query("DELETE FROM connecte WHERE pseudo = '$user'");
$it = time()-3600*24;
setcookie("memlove", "", "$it");
setcookie("deconnecte", "$user", time()+3600);
?>
<script>
	window.location="../connexion.php";
</script>