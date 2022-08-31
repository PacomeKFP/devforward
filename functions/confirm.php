<?php require('../config/database.php');?>
<?php require('../includes/constants.php');?>
<script>livre = 1</script>
<?php
if (isset($_GET['apel'])){
    if ($_GET['apel']=='confirm'){
        $user = $_COOKIE['user'];
        $id = $_GET['id'];
        global $db;
        $rep = $db->query("SELECT * FROM has WHERE id = $id");
        $don = $rep->fetch();
        $pseudo = $don['pseudo'];

        $db->query("UPDATE amis SET etat=1 WHERE recepteur = '$user' AND envoyeur = '$pseudo'");
        echo "Invitation validée !";
        setcookie("test", 0);
//        if (isset($_COOKIE['test']) and $_COOKIE['test']==0){
//            $js = '<script>location.reload();</script>';
//            echo $js;
//            setcookie("test", "2", time()-6330);
//        }


    }
}
?>