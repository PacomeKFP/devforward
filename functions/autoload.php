<?php require('../config/database.php');?>
<?php require('../includes/constants.php');?>



<?php
if (isset($_GET['part'])){

    global $db;
    $user = $_COOKIE['user'];
    $interlocuteur = $_COOKIE["interlocuteur"];
    if ($_GET['part']=='statut'){
        $time = time();
        $re = $db->query("SELECT * FROM connecte WHERE pseudo = '$interlocuteur'");
        $donnees = $re->fetch();
        $ip=$donnees['ip'];
        $tmp_ecoule = $time-$ip;
        if ($tmp_ecoule>4){
            echo ' <div class="inter-name btn-lg" id="interlocuteur">'.$interlocuteur.'</div><div class="inter-statut-off"> Hors ligne</div>';
            $db->query("DELETE FROM connecte WHERE pseudo = '$interlocuteur'");
        }else{
            echo ' <div class="inter-name btn-lg" id="interlocuteur">'.$interlocuteur.'</div><div class="inter-statut-on"> En ligne</div>';
            $db->query("UPDATE connecte SET ip = '$time' WHERE pseudo = '$interlocuteur'");
        }
    }


    if ($_GET['part']=='body'){

        $pseudo = $interlocuteur;
        $user = $_COOKIE['user'];
        $discution = $db->query("SELECT * FROM message WHERE destinateur='$user' AND destinataire = '$pseudo' or destinateur='$pseudo' AND destinataire = '$user' ORDER BY temps ASC");
        while ($donnees=$discution->fetch()){
            $datez = $donnees['temps'];
            $mois = date("F", "$datez");
            $jour = date('d',"$datez");
            $annee = date('Y', "$datez");
            $heure = date('H', "$datez");
            $minute = date('i', "$datez");
$db->query("UPDATE message set vu = 1 WHERE destinateur = '$interlocuteur' And destinataire = 'user'");


            $temps = $jour.' '. translate("$mois") . ' ' .$annee. ' à ' . $heure . ':'.$minute;
            if ($donnees['destinateur']==$interlocuteur){
                $classe = 'class="all msg-interloc"';
            }else{
                $classe = 'class="all msg-user"';
            }
            $message = $donnees['message'];
            ?>
            <div <?php echo $classe ?>>
                <div class="title"><?php echo $donnees['destinateur'] ?> <br></div >
                <div class="content"><?php echo $message ?><br><br>
                    <div class="vide"><?php echo $temps?></div>
                </div >
            </div>
            <br>
            <?php


        }
    }
    
    

}



