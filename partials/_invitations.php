<?php require('../config/database.php');?>
<?php require('../includes/constants.php');?>
    <script>
        var user = "<?php echo $_COOKIE['user'] ?>";
        function inviter(a) {
            var  la= a;
            // var iddentifieur =document.getElementById("inviter"+a).id;
            $('#inviter').load("functions/inviter.php?apel=inviter&id="+la+"&user="+user).fadeIn("Slow");
        }
        function discuter(a) {
            $('#discuter'+a).load("search.php?apel=inviter&id="+a+"&user="+user).fadeIn("Slow");
        }
        if (undefined){


            function inviteraa(a) {
                var la =a;
                $("#center").load("functions/inviter.php?apel=inviter&id="+la).fadeIn("Slow");
                console.log("EnvoyÃ© ! Ã  "+a);
            }
        }
    </script>
<?php
global $db;
$user = $_COOKIE['user'];
$resultat = $db->query("SELECT * FROM amis WHERE recepteur = '$user' AND etat = 0 ORDER BY temps DESC");
while ($don=$resultat->fetch()){
    $personne = $don['envoyeur'];
    $result = $db->query("SELECT * FROM has WHERE pseudo = '$personne'");
    while ($donnees = $result->fetch()) {

        extract($donnees);
        $textDiscuss = "Accepter l'invitation";
        $divDiscuss = "<div onclick='confirm($id)' class='btn btn-lg alert-danger' id='confirm$id'>".'<img src="assets/image/New_Folder/check.png" class="img-reduce">';
        $divContainer = "<div class='search-result'>";
        $divImg = "<div class='search-result-image'> ";
        $img = "<img class='img-circle' src='$photo'> </img>";
        $divNames = "<div class='search-result-names btn-lg'>";
        $divClose = "</div>";

        $profil = $divImg . $img . $divClose;
        $names = $divNames . $nom . ' ' . $prenom . '<br>' . $pseudo . $divClose;
        $discuss = $divDiscuss . $textDiscuss . $divClose;
        $content = $divContainer . $profil . $names . $discuss . $divClose;
        $db->query("UPDATE amis SET vu = 1 WHERE recepteur = '$user' ");
        if ($pseudo != $user) {
            echo $content;
        }
    }
}
