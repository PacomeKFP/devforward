<script>
    function profil() {
        $("#center").load("functions/profil.php?type=call").fadeIn("Slow");
    }
</script>
<div class="left">

    <div class="profile form-group">
        <div class="profile-title">Profile de <?php echo USER_NAME.' '.USER_SURNAME?></div>
        <div class="photo-ip-adresse logo">

        </div>
        <br>
        <div class="description">Qui est <?php echo USER_PSEUDO?> ?</div>
        <br>
        <div class="description-ok">
            <?php
            global $db;
            $user = USER_PSEUDO;
            $re = $db->query("SELECT * FROM profil WHERE pseudo = '$user'");
            if ($re->rowCount()!=0){
                $donnee = $re->fetch();
                echo $donnee['biographie'];
            }else{
                echo "Aucune biographie pour le moment...";
            }

            ?>
        </div>
        <br>
        <div class="nbr-amis">
            <?php
                $nbr_amis = $db->query("SELECT * FROM amis WHERE etat = 1 and envoyeur = '$user' or etat = 1 and recepteur = '$user'" );
                echo $nbr_amis->rowCount().' ami (s)';
                           ?>
        </div>
        <br>
    </div>
    <div class="btn btn-lg btn-primary" onclick="profil()">Completer mon profil</div>

</div>