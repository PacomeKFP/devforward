<?php require('config/database.php');?>
<?php require('includes/functions.php');?>
<?php require('includes/encodings.php');?>
<?php require('includes/constants.php');?>
<?php
session_start();
if (isset($_COOKIE['memlove']) and !isset($_COOKIE['deconnecte'])){
    global $db;


    $id = $_COOKIE['memlove'];

    global $db;
    extract($_COOKIE);

    $table = 'has';
    $field = 'id';
    $reponse = $db->query("SELECT * FROM $table WHERE $field = $id");
    $donnees = $reponse->fetch();

    $nom = $donnees['nom'];
    $prenom = $donnees['prenom'];
    $pseudo = $donnees['pseudo'];
    $email = $donnees['email'];
    
    $top = $db->query("SELECT * FROM profil WHERE pseudo = '$pseudo'");
    if($top->rowCount()!=0){
    	$ra = $top->fetch();
    	$photoF = $ra['photo'];
    }else{
    	$photoF = $donnees['photo'];
    }
    
    $a = '<img class="img-circle" src="functions/tmp/profils/';
    $b = '"></img>';
    $photo = $a.$photoF.$b;
    $img = "<div class='profil-img'>".$photo."</div>";
    $names = '<div class="names"> '.$nom.' ' .$prenom.'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alias '.$pseudo.'</div>';
    $noms = '<div class="noms">'.$img . $names.'</div>';
    setcookie("user", "$pseudo");
    setcookie("userName", "$nom");
    setcookie("userPrenom", "$prenom");
    $_SESSION['user']=$pseudo;
    define('USER_NAME', "$nom");
    define('USER_SURNAME', "$prenom");
    define('USER_PSEUDO', "$pseudo");
    define('USER_ID', "$id");
    define('USER_EMAIL', "$email");
	define('USER_NAMES', "$noms");
	setcookie("names", "$noms", time()+3600); 

    connecte(USER_PSEUDO);
    //setcookie("memlove", "$memlove", time() + 3600*24*31*6);

    //Gestion des messages

    $search = 0;



    $divo = "<div class='display'>";
    $divc = "</div>";



    if (isset($_POST['search'])) {
        extract($_POST);
        $errors = array();


        if (empty($text) || trim($text)) {
            $errors[] = "Veillez entrer un nom, un prenom ou un alias";
        }

        if (count($errors) == 0) {
            setcookie('search', "ok", time() + 3600);
            $search = 1;
            global $db;

        }




    }

if (isset($_COOKIE['nbr_connect']) and $_COOKIE['nbr_connect']==0){
    setcookie("nbr_connect", 5, time()-3600);
        $js = '<script>location.reload(); </script>';
        echo $js;

}


    include('views/user.view.php');
//    <div></div>

}else {
        $pacome = '<script>window.location = "connexion.php"</script>';
        echo $pacome;
//    cubrid_connect_with_url("localhost/Perso/index.php", "PUBLIC", "", "localhost/Perso/index.php");

    }

