
<?php require('config/database.php');?>
<?php require('includes/functions.php');?>
<?php require('includes/encodings.php');?>
<?php require('includes/constants.php');?>
<?php
setcookie("memlove", "papa", time()-500);

if(isset($_COOKIE['deconnecte'])){
$user=$_COOKIE['deconnecte'];
$db->query("DELETE FROM connecte WHERE pseudo = '$user'");

}
if(isset($_POST['connect']))  {


    extract($_POST);

    // si tous les champs ont été remplis
    if(not_empty($pseudo, $email, $password, 'a', 'a', 'a', 'a', 'a')){

        $errors = array();//tableau d'érreurs

        if(mb_strlen($pseudo) < 3){

            $errors[] = "Pseudo trop court (Minimum 3 caractères)";

        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

            $errors[] = "Adresse Email invalide!";

        }

        if(mb_strlen($password) < 6){

            $errors[] = "Mot de passe trop court (Minimum 6 caractères)";

        }

        if(!is_already_in_use('email', $email, 'has')){

            $errors[] = "E-mail erronée";

        }

        if(!is_already_in_use('pseudo', $pseudo, 'has')){

            $errors[] = "Pseudo erroné";

        }

        if(!is_already_in_use('password', $password, 'has')){

            $errors[] = "Mot de passe erroné";

        }

        global $db;

        $reponse = $db->query("SELECT * FROM has WHERE pseudo = '$pseudo'");
        $reponse->setFetchMode(PDO::FETCH_ASSOC);
        $ligne = $reponse->fetch();



        if($ligne['email']!=$email){
            $errors[]="Adresse Email erronée";
        }
        if($ligne['password']!=$password){
            $errors[]="Mot de passe erroné";
        }
        $_SESSION['reload']=0;


        echo 'papa';

        //si le décompte d'érreurs est égale à zero, alors on se connecte au compte
        if(count($errors) == 0){
            //aller chercher l'id du users puis

            $id = $ligne['id'];
//            setcookie("memlove", "$id", time() + 3600*24*31*6);
//            $pacome ='<script>window.location = "http://localhost/Perso/user.php"</script>';
//            echo $pacome;
            $expire = time() + 3600*24*31*6;
            setcookie("memlove", "$id", "$expire");
            session_start();
            $_SESSION["memlove"]=$id;
            $_COOKIE["memlove"]=$id;
            $js = '	<script>window.location = "user.php";</script>';
           // $pacome ='<script>window.location = "http://localhost/Perso/user.php"</script>';
            echo $js;
            setcookie("nbr_connect", 0, time()+3600);
        }



    }

}



?>
<?php require('views/connexion.view.php'); ?>