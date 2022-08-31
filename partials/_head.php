<?php
//session_start();
	if(!defined('DB_HOS'))define('DB_HOS', 'localhost');
	if(!defined('DB_NAM'))define('DB_NAM', 'boom');
	if(!defined('DB_USERNAM'))define('DB_USERNAM', 'root');
	if(!defined('DB_PASSWOR'))define('DB_PASSWOR', '');	
	
		try{
	
		$bdd = new PDO("mysql: host =".DB_HOS."; dbname=".DB_NAM, DB_USERNAM, DB_PASSWOR);
		
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	
	}catch(PDOException $e){
	
		die('Erreur: '. $e->getMessage());
		
	}

 ?>

<?php 

		isset($pseudo)?	$user = $pseudo:	$user = $_COOKIE['user'];
			
    
	global $bdd;
    $re = $bdd->query("SELECT * FROM amis WHERE vu = 0 and recepteur = '$user' AND etat = 0");
    if ($re->rowCount()!=0){
        $nbr_invitations = $re->rowCount();
    }
    $res = $bdd->query("SELECT * FROM message WHERE vu = 0 and destinataire = '$user'");
    if ($res->rowCount()!=0){
        $nbr_msg = $res->rowCount();
    }
	$resultat = $bdd->query("SELECT * FROM amis WHERE etat = 1 and envoyeur = '$user' or etat = 1 and recepteur = '$user' ORDER BY frequence DESC");
$nbr_connecte=0;
        while ($don=$resultat->fetch()){
            $personne = $don['envoyeur'];
            if($don['envoyeur']==$user){
                	$ami = $don['recepteur'];
            }else{
            	$ami = $don['envoyeur'];
            }
            $ree = $bdd->query("SELECT * FROM connecte WHERE pseudo = '$ami'");
			if($ree->rowCount()!=0)$nbr_connecte++;
		}
		
		$divo = "<div class='display'>";
    $divc = "</div>";

?>
<script>
    var user = "<?php echo $_COOKIE['user'] ?>";
    // document.getElementById("centre").value;
    function inviter(a) {
        var  la= a;
        // var iddentifieur =document.getElementById("inviter"+a).id;
        $.('#inviter').load("functions/inviter.php?apel=inviter&id="+la+"&user="+user).fadeIn("Slow");
    }
    function discuter(a) {
        $.('#discuter'+a).load("search.php?apel=inviter&id="+a+"&user="+user).fadeIn("Slow");
    }
    function viewInvitation() {
        document.getElementById("invitationsRecus").style.visibility=hidden;
        $("#center").load("partials/_invitations.php").fadeIn("Slow");
    }
    function viewInvitations() {
        document.getElementById("invitationsRecus").style.visibility=hidden;
        $("#center").load("partials/_invitations.php").fadeIn("Slow");
    }
    function search() {
        $('#center').load('functions/search.php?apel=recherche&user='+user+'&text='+document.getElementById('search').value).fadeIn('Slow');
    }
	function online(){
		
	}
</script>

<div class="page-header">


    <div class="profil">

        <div class="name-search-part">
            <!--                partie profil-->
            <?php echo isset($noms)
						?	$noms
						:	$_COOKIE['names'];
			 ?>
            <!--            barre de recherche-->
            <br> 
                <input name="text" type="text" id="search" class="form-control search">
                <input name="search" type="submit" onclick="search()" value="Chercher" class="btn btn-primary btn-lg" >
        </div><div id="aut" class="object">
        <div class="" id="obj">

            <span></span>
            <?php if (isset($nbr_invitations))
            echo '<div class="btn-primary btn" onclick="viewInvitations()" id="invitationsRecus">Invitations reçues  '.$divo.$nbr_invitations.$divc.$divc.'&nbsp;';
            	  if (isset($nbr_msg))
            echo '<div class="btn-primary btn" onclick="viewMessages()" id="messagesRecus">Messages manqués  '.$divo.$nbr_msg.$divc.$divc.'&nbsp;';
					if (isset($nbr_connecte) and $nbr_connecte!=0)
            echo '<div class="btn-primary btn" onclick="$(\'#center\').load(\'partials/_right.php #sel\');	" id="messagesRecus">Amis en ligne  '.$divo.$nbr_connecte.$divc.$divc.'&nbsp;';
            ?>
        </div>
		</div>
    </div>

</div>