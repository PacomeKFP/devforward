<?php
//session_start();
	if(!defined('DB_HOS'))define('DB_HOS', 'localhost');
	if(!defined('DB_NAM'))define('DB_NAM', 'boom');
	if(!defined('DB_USERNAM'))define('DB_USERNAM', 'root');
	if(!defined('DB_PASSWOR'))define('DB_PASSWOR', '');	
	
		try{
	
		$db = new PDO("mysql: host =".DB_HOS."; dbname=".DB_NAM, DB_USERNAM, DB_PASSWOR);
		
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	
	}catch(PDOException $e){
	
		die('Erreur: '. $e->getMessage());
		
	}

 ?>
<script>
    function discuss(a) {
		right();right();
        document.getElementById("discuss"+a).id="test";
        $("#center").load("functions/messages.php?apel=discuss&id="+a).fadeIn("Slow");
    }
</script>
<div class="right">
	<div class="friends-view" id="sel">
		<b class="text-milieu">Amis en ligne</b> <br><?php
		if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
		}
		if(isset($_COOKIE['user'])){
		$user = $_COOKIE['user'];
		}
		if(defined('USER_PSEUDO')){
		$user = USER_PSEUDO;
		}

        global $db;
        $resultat = $db->query("SELECT * FROM amis WHERE etat = 1 and envoyeur = '$user' or etat = 1 and recepteur = '$user' ORDER BY frequence DESC");

        while ($don=$resultat->fetch()){
            $personne = $don['envoyeur'];
            if($don['envoyeur']==$user){
                	$ami = $don['recepteur'];
            }else{
            	$ami = $don['envoyeur'];
            }
            $ree = $db->query("SELECT * FROM connecte WHERE pseudo = '$ami'");
            if($ree->rowCount()!=0){
            $result = $db->query("SELECT * FROM has WHERE pseudo = '$ami'");
            while ($donnees = $result->fetch()) {
			$res = $db->query("SELECT * FROM profil WHERE pseudo = '$ami'");
			
                extract($donnees);
            if($res->rowCount()!=0){
				$red = $res->fetch();
				$photoF = "functions/tmp/profils/".$red['photo'];	
			}else{
				$photoF = $photo;	
			}

    	$re = $db->query("SELECT * FROM connecte WHERE pseudo = '$pseudo'");
    	$donnee = $re->fetch();
    	$ip=$donnee['ip'];
    	$time = time();
        $tmp_ecoule = $time-$ip;
        $pseu = '';
        if ($tmp_ecoule>10){
            $statut = '<span class="inter-statut-off"> Hors ligne</span>';

            $db->query("DELETE FROM connecte WHERE pseudo = '$pseudo'");
        }else{
            $statut = '<span class="inter-statut-on"> En ligne</span>';
            $db->query("UPDATE connecte SET ip = '$time' WHERE pseudo = '$pseudo'");
        }
                
                
                $textDiscuss = "Lancer une discution";
                $divDiscuss = "<div onclick='discuss($id)' class='btn alert-danger' id='discuss$id'>";
                $divContainer = "<div class='search-result'>";
                $divImg = "<div class='search-result-image'> ";
                $img = "<img class='img-circle' src='$photoF'> </img>";
                $divNames = "<div class='search-result-names btn-lg'>";
                $divClose = "</div>";

                $profil = $divImg . $img . $divClose;
                $names = $divNames . $nom . ' ' . $prenom . '<br> '. $pseudo . $divClose;
                $discuss = $divDiscuss . $textDiscuss . '<img src="assets/image/New_Folder/ic_menu_start_conversation.png" class="img-reduce">' .$divClose;
                $content = $divContainer . $profil . $names . $discuss . $divClose;
                if ($pseudo != $user) {
                    echo $content;
                }
            }
            }
        } 

        ?>
	</div>
</div>
<script>

	
	var autolaod = setInterval(function(){
			$('#right').load("partials/_right.php").fadeIn("Slow");	
		}, 300000)
	
	
</script>
