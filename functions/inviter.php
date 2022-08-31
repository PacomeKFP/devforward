<?php require('../config/database.php');?>
<?php require('../includes/constants.php');?>
<script>livre = 1</script>
<script>
    var user = "<?php echo $_COOKIE['user'] ?>";
    // function inviter(a) {
    //     var  la= a;
    //     // var iddentifieur =document.getElementById("inviter"+a).id;
    //     $('#inviter').load("functions/inviter.php?apel=inviter&id="+la+"&user="+user).fadeIn("Slow");
    // }
    // function discuter(a) {
    //     $('#discuter'+a).load("search.php?apel=inviter&id="+a+"&user="+user).fadeIn("Slow");
    // }
    // function inviteraa() {
    //     alert("pacome");

</script>
<?php
if (isset($_GET['apel'])) {
    $user = $_COOKIE['user'];
    global $db;
    //fonction d'invitation

        $id = $_GET['id'];
        $user = $_COOKIE['user'];
        $var = $db->query("SELECT * FROM has WHERE id = $id");
        $vrac = $var->fetch();
        $recepteur = $vrac['pseudo'];
        $time = time();
        $db->query("INSERT INTO amis VALUES ('$user', '$recepteur', '$time', '0', '0', '0', 'Invitation envoyÃ©e !')");
        echo "invitation envoyée !";

}