
<?php

	if(!defined('not_empty')){
	
		function not_empty($a, $b, $c, $d, $e, $f, $g, $h){
			$tab = array($a, $b, $c, $d, $e);
			if(count($tab) !=0 ){
				for($i=0; $i<count($tab); $i++){
					if( empty($tab[$i]) || trim($tab[$i]) == "" ){
						return false;
					}
				}
				return true;
			}
			
			/*function not_empty($fields = array())
			if(count($fields) != 0){
				foreach($i = 0; $i < count($fields; $i++)){
					if(empty($field[$i]) || trim($field[$i]) == ""){
						return false; 
					}
				}
				
				return true;
			}*/
		}
		
		 
	
	}
	
	if(!defined('is_already_in_use')){
	
		function is_already_in_use($field, $value, $table){
		
			global $db;
			
			$q = $db->prepare("SELECT id FROM $table WHERE $field=?");
			$q->execute([$value]);
			
			$count = $q->rowCount();
			
			$q->closeCursor();

			return $count;
		}
	
	}

	if(!defined('read_user')){
	    function read_user($id){
            global $db;
            extract($_COOKIE);
            ignore_user_abort(true);


            $table = 'has';
            $field = 'id';
            $reponse = $db->query("SELECT * FROM $table WHERE $field = $id");
            $donnees = $reponse->fetch();

            $nom = $donnees['nom'];
            $prenom = $donnees['prenom'];
            $pseudo = $donnees['pseudo'];
            $email = $donnees['email'];
            $a = '<img class="img-circle" src="';
            $b = '"></img>';
            $photo = $a.$donnees['photo'].$b;
            $img = "<div class='profil-img'>".$photo."</div>";
            $names = '<div class="names"> '.$nom.' ' .$prenom.'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Alias '.$pseudo.'</div>';
            $noms = '<div class="noms">'.$img . $names.'</div>';
            define('USER_NAME', "$nom");
            define('USER_SURNAME', "$prenom");
            define('USER_PSEUDO', "$pseudo");
            define('USER_ID', "$id");
            define('USER_EMAIL', "$email");
            //register_shutdown_function('deconnecte', USER_PSEUDO);

        }
    }
    if (!defined('get_ip')){
    function get_ip($ip) {
        // IP si internet partagé
        if (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        // IP derrière un proxy
        elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        // Sinon : IP normale
        else {
            $ip = (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
        }
    }
}

	if (!defined('concecte')){
	    function connecte($user){
	        global $db;
	        $ip = '';
            if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            // IP derrière un proxy
            elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            // Sinon : IP normale
            else {
                $ip = (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
            }
            $time = time();
            $re = $db->query("select * from connecte where pseudo = '$user'");
            if ($re->rowCount()==0){
                $db->query("INSERT INTO connecte VALUES ('$user', '$time')");
            }

        }
    }

    if (!defined('recherche')){
    function recherche($text){
        global $db;
        $errors = [];
        $resultat = $db->query("SELECT * FROM has WHERE pseudo LIKE '%$text%'");
        if (count($resultat)==0){
            $errors[] = 'Aucun resultat pour '.$text;
        }else{
            while ($donnees = $resultat->fetch()){
                extract($donnees);

                //Test d'amitié
//                    $pseudo1 = $donnees['pseudo'];
                $testamitie1 = $db->query("SELECT * FROM ami WHERE envoyeur = $pseudo AND recepteur = USER_PSEUDO");
                $testamitie2 = $db->query("SELECT * FROM ami WHERE envoyeur = $pseudo AND recepteur = USER_PSEUDO");

                if ($testamitie1==1 or $testamitie2==1){
                    $divDiscuss = "<div onclick='' href=<?php  ?> class='btn btn-lg alert-info'>";
                    $textDiscuss = "Lancer une discution";
                }
                if ($testamitie1!=1 and $testamitie2 !=1){
                    $divDiscuss = "<div onclick='inviter($id)' class='btn btn-lg alert-success'>";
                    $textDiscuss = "Envoyer une invitation";
                }

                $divContainer = "<div class='search-result'>";
                $divImg = "<div class='search-result-image'> ";
                $img = "<img class='img-circle' src='$photo'> </img>";
                $divNames = "<div class='search-result-names'>";
                $divClose = "</div>";

                $profil = $divImg.$img.$divClose;
                $names = $divNames.$nom.' '.$prenom.'<br>'.$pseudo.$divClose;
                $discuss = $divDiscuss.$textDiscuss.$divClose;
                $content = $divContainer.$profil.$names.$discuss.$divClose;

                if ($pseudo!=USER_PSEUDO){
                    echo $content;
                }


            }
        }
    }
}

	/*

	if (!defined('melange')){
            //melange le pseudo, le pin, et l'email
	    function melange($txt, $nbr, $mail){
	       $txt_len = mb_strlen($txt);
	       $nbr_len = mb_strlen($nbr);
	       $mail_len = mb_strlen($mail);
            $txt1 = "";
            $nbr1 = "";
            $mail1 = "";
	        $txt2 = "";
	        $nbr2 = "";
	       $mail2 = "";


              appNormeA($txt, $txt1);
              appNormeA($nbr, $nbr1);
            appNormeA($mail, $mail1);

              appNormeA($txt1, $txt2);
              appNormeA($nbr1, $nbr2);
            appNormeA($mail1, $mail2);


        }

    }

    if (!defined('know')){
        function know($table, $field, $id){
            global $db;
            $reponse = $db->query("SELECT * FROM $table");
            $rep = $db->query("SELECT * FROM $table WHERE $field=$id");
            $don = $rep->fetch();
            $pseudo = $don['pseudo'];

            $i=0;
//            <input name="numero_invitation" value="'.$j.'">
            while($donnees = $reponse->fetch()){
                $j = $donnees['id'];
                $nom = $donnees['nom'];
                $prenom = $donnees['prenom'];
                $pseudo1 = $donnees['pseudo'];
                $description = $donnees['description'];
                $a = '<img class="img-circle" src="';
                $b = '"></img>';
                $photo = $a.$donnees['photo'].$b;
                $img = "<div class='profil-img'>".$photo."</div>";
                $numero = '<input name="invitation_id" class="invisible" hidden="hidden" value="'.$j.'" >';
                $invitation = '<div class="invitation btn btn-lg btn-primary" id="inviter"  onclick="inviter('.$j.')">Inviter</div>';
                $affiche ='<form class="know-content-direct"> '.$img. '<br>'.$nom. '  ' . $prenom .'<br>  Alias ' .$pseudo1.' <br>'.$invitation.$numero.'</form>';


//                setcookie("invitation", "$j", time()+3600);

                if($pseudo != $pseudo1){
                    echo $affiche;

                }
            }
        }
    }

    if (!defined('msgSend')){

        function msgSend($destinateur, $destinataire, $msg, $piece){
            global $db;
            $time = time();
            $db->query("INSERT INTO message VALUES ('', '$destinateur', '$destinataire', '$msg', '$time', '$piece')");
            $reponse = $db->query("SELECT * FROM amis WHERE personne = $destinateur AND ami = $destinataire");
            $donnees = $reponse->fetch();
            $id = $donnees['id'];
            $pseudo_personne = $donnees['personne'];
            $psuedo_ami = $donnees['ami'];
            $frequence = $donnees['frequence'];
            $frequence = $frequence++;

            $db->query("UPDATE ami SET $frequence WHERE id=$id ");

        }

    }

    if (!defined('found')){

        function found($txt, $nome, $prenome, $pseudoe){
            global $db;
            $nome = $db->query("SELECT * FROM has WHERE nom LIKE '%$txt%'");
            $prenome = $db->query("SELECT * FROM has WHERE nom LIKE '%$txt%'");
            $pseudoe = $db->query("SELECT * FROM has WHERE nom LIKE '%$txt%'");

        }

    }

    if (!defined('edit_names_result')){

    function edit_names_result($nom1, $prenom1, $pseudo1){
        $Gdivo = '<div class="search-result-nom">';
        $Pdivo = '<div class="search-result-title">';
        $Gdivc = '</div>';
        echo $Gdivo;
        echo $Pdivo;
        echo 'Noms <br>';
        echo $Gdivc;
        while ($donnees = $nom1->fetch()){

            $divo = '<div class="search-result>';
            $divc = '</div>';


            $nom = $donnees['nom'];
            $prenom = $donnees['prenom'];
            $pseudo = $donnees['pseudo'];
            $description = $donnees['description'];
            $a = '<img class="img-circle" src="';
            $b = '"></img>';
            $photo = $a.$donnees['photo'].$b;
            $img = "<div class='profil-img'>".$photo."</div>";
            $affiche ='<div class="know-content-direct"> '.$img. '<br>'.$nom. '  ' . $prenom .'<br>  Alias ' .$pseudo.' <br><div class="invitation btn btn-lg btn-primary" >Inviter</button></div>';

            echo $divo;
            echo $affiche;
            echo $divc;


        }
        echo $Gdivc;

        //Prenoms
        $Gdivo = '<div class="search-result-prenom">';
        $Pdivo = '<div class="search-result-title">';
        $Gdivc = '</div>';
        echo $Gdivo;
        echo $Pdivo;
        echo 'Prenoms <br>';
        echo $Gdivc;

        while ($donnees = $prenom1->fetch()){
            $divo = '<div class="search-result">';
            $divc = '</div>';

            $nom = $donnees['nom'];
            $prenom = $donnees['prenom'];
            $pseudo = $donnees['pseudo'];
            $description = $donnees['description'];
            $a = '<img class="img-circle" src="';
            $b = '"></img>';
            $photo = $a.$donnees['photo'].$b;
            $img = "<div class='profil-img'>".$photo."</div>";
            $affiche ='<div class="know-content-direct"> '.$img. '<br>'.$nom. '  ' . $prenom .'<br>  Alias ' .$pseudo.' <br><div class="invitation btn btn-lg btn-primary" id="inviter" >Inviter</div></div>';


            echo $divo;
            echo $affiche;
            echo $divc;

        }
        echo $Gdivc;

        //Pseudo
        if (count($pseudo1))
        $Gdivo = '<div class="search-result-pseudo">';
        $Pdivo = '<div class="search-result-title">';
        $Gdivc = '</div>';
        echo $Gdivo;
        echo $Pdivo;
        echo 'Pseudo <br>';
        echo $Gdivc;



        while ($donnees = $pseudo1->fetch()){

            $divo = '<div class="search-result>';
            $divc = '</div>';

            $nom = $donnees['nom'];
            $prenom = $donnees['prenom'];
            $pseudo = $donnees['pseudo'];
            $description = $donnees['description'];
            $a = '<img class="img-circle" src="';
            $b = '"></img>';
            $photo = $a.$donnees['photo'].$b;
            $img = "<div class='profil-img'>".$photo."</div>";
            $affiche ='<div class="know-content-direct"> '.$img. '<br>'.$nom. '  ' . $prenom .'<br>  Alias ' .$pseudo.' <br><div class="invitation btn btn-lg btn-primary">Inviter</div></div>';

            echo $divo;
            echo $affiche;
            echo $divc;

        }
        echo $Gdivc;
    }

    function b($nom, $prenom, $pseudo){}



}


    if (!defined('read_news')){

    function read_news($user){
        global $db;
        $db->query("SELECT * FROM news ORDER BY heure DESC");

    }

}

    if (!defined('edit_pseudo_result')){

    function edit_pseudo_result($pseudo){


    }

}

    if (!defined('read_friends')){

    function read_friends($user){
        global $db;
        $friends = $db->query("SELECT * FROM amis WHERE personne=$user ORDER BY frequence DESC");
        $connecte = $db->query("SELECT * FROM connecte WHERE pseudo != $user");


        while ($donnees = $friends->fetch() and $connect = $connecte->fetch()){
            $personnel_connected=$connect['pseudo'];
            $ami = $donnees['ami'];
            $amis = $db->query("SELECT * FROM has WHERE pseudo=$ami");

                $donnee = $amis->fetch();
                $nom = $donnee['nom'];
                $prenom = $donnee['prenom'];
                $pseudo = $donnee['pseudo'];
                $description = $donnee['description'];
                $photo = $donnee['photo'];

                $divo = '<div class="friend">';
                $divc = '</div>';
                $divo1 = '<div class="friend-profiles">';
                $divo2 = '<div class="friend-names">';
                $divo3 = '<div class="btn btn-lg btn-primary invitation friend-discuss">';
                $divo4 = '<div class="statut">';

                $imgo = '<img>';
                $imgc = '</img>';

                echo $divo;
                echo $divo1;
                echo $imgo.$photo.$imgc;
                echo $divc;
                if ($ami==$personnel_connected){
                    echo $divo4;
                    echo $divc;
                }
                echo $divo2;
                echo $nom.' '.$prenom.'<br> Alias '.$pseudo;
                echo $divc;
                echo $divo3;
                echo 'Discuter';
                echo $divc;
                echo $divc;

        }
    }

}

    if (!defined('get_ip')){
        function get_ip() {
            // IP si internet partagé
            if (isset($_SERVER['HTTP_CLIENT_IP'])) {
                return $_SERVER['HTTP_CLIENT_IP'];
            }
            // IP derrière un proxy
            elseif (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            // Sinon : IP normale
            else {
                return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
            }
        }
    }

    if (!defined('connecte')){
        function connecte($user){
            global $db;
            $ip = get_ip();
            $db->query("INSERT INTO connecte(pseudo, ip) VALUES ('$user', '$ip')");
        }
    }

    if (!defined('deconnecte')){
        function deconnecte($user){
        global $db;
        $db->query("DELETE FROM connecte WHERE pseudo = '$user'");
    }
    }

    if (!defined('search')){
        function search($type, $text, $user){
            global $db;
            if ($type=='pseudo'){
                $pseudo = $db->query("SELECT * FROM has WHERE pseudo LIKE '%$text%' ORDER BY  pseudo ASC");
                if (count($pseudo)==0){
                    $errors[]="Aucun pseudonyme correspondant à ".$text;
                }else{
                    while ($donnees=$pseudo->fetch()){
//                        $div = '<div>';
//                        $div = '</div>';

                        $inviter = "";
                        $id = $donnees['id'];
                        $nom = $donnees['nom'];
                        $prenom = $donnees['prenom'];
                        $pseudo = $donnees['pseudo'];
                        $description = $donnees['description'];
                        $a = '<img class="img-circle" src="';
                        $b = '"></img>';
                        $photo = $a.$donnees['photo'].$b;
                        $img = "<div class='profil-img'>".$photo."</div>";
                        $friend = $db->query("SELECT * FROM amis WHERE personne = $pseudo AND ami = $user");

                        if (count($friend)==0){
                            $inviter = "<div class='invitation btn btn-lg btn-primary' onclick='".setcookie('invitation', "$id", time()+5)."'>Inviter</div>";
                        }
                        if (count($friend)!=0){
                            $inviter = "<div class='invitation btn btn-lg btn-primary' onclick='discuss($id)'>Discuter</div>";
                        }

                        $affiche ='<div class="know-content-direct"> '.$img. '<br>'.$nom. '  ' . $prenom .'<br>  Alias ' .$pseudo.' <br>'.$inviter.'</div>';
                        return $affiche;
                    }
                }
            } elseif ($type=='names') {
                $nom = $db->query("SELECT * FROM has WHERE nom LIKE '%$text%' ORDER BY  nom ASC");
                $prenom = $db->query("SELECT * FROM has WHERE prenom LIKE '%$text%' ORDER BY  prenom ASC");

                while ($noms = $nom->fetch() and $prenoms = $prenom->fetch()) {
                    $a = '<img class="img-circle" src="';
                    $b = '"></img>';


                    $id1 = $noms['id'];
                    $nom1 = $noms['nom'];
                    $prenom1 = $noms['prenom'];
                    $pseudo1 = $noms['pseudo'];
                    $description1 = $noms['description'];
                    $photo1 = $a . $noms['photo'] . $b;

                    $id2 = $prenoms['id'];
                    $nom2 = $prenoms['nom'];
                    $prenom2 = $prenoms['prenom'];
                    $pseudo2 = $prenoms['pseudo'];
                    $description2 = $prenoms['description'];
                    $photo2 = $a . $prenoms['photo'] . $b;

                    if ($pseudo1 == $pseudo2) {
                        $pseudo =$pseudo1;
                        $id = $id1;
                        $nom=$nom1;
                        $prenom=$prenom1;
                        $photo = $photo1;
                        $img = "<div class='profil-img'>" . $photo . "</div>";
                        $friend = $db->query("SELECT * FROM amis WHERE personne = $pseudo AND ami = $user");

                        if (count($friend) == 0) {
                            $inviter = "<div class='invitation btn btn-lg btn-primary' onclick='inviter($id)'>Inviter</div>";
                        }
                        if (count($friend) != 0) {
                            $inviter = "<div class='invitation btn btn-lg btn-primary' onclick='discuss($id)'>Discuter</div>";
                        }
                        $numero = '<input name="invitation_id" class="invisible" hidden="hidden" value="'.$id.'" >';
                        $affiche ='<form class="know-content-direct"> '.$img. '<br>'.$nom. '  ' . $prenom .'<br>  Alias ' .$pseudo.' <br>'.$inviter.$numero.'</form>';
                        return $affiche;

                    }else {
                        ////////////////////////
                        $img = "<div class='profil-img'>" . $photo1 . "</div>";
                        $friend = $db->query("SELECT * FROM amis WHERE personne = $pseudo1 AND ami = $user");

                        if (count($friend) == 0) {
                            $inviter1 = "<div class='invitation btn btn-lg btn-primary' onclick='inviter($id1)'>Inviter</div>";
                        }
                        if (count($friend) != 0) {
                            $inviter1 = "<div class='invitation btn btn-lg btn-primary' onclick='discuss($id1)'>Discuter</div>";
                        }
                        $numero1 = '<input name="invitation_id" class="invisible" hidden="hidden" value="'.$id1.'" >';
                        $affiche1 ='<form class="know-content-direct"> '.$img. '<br>'.$nom1. '  ' . $prenom1 .'<br>  Alias ' .$pseudo1.' <br>'.$inviter1.$numero1.'</form>';
                        return $affiche1;

                        ////////////////////////////

                        $img = "<div class='profil-img'>" . $photo2 . "</div>";
                        $friend = $db->query("SELECT * FROM amis WHERE personne = $pseudo2 AND ami = $user");

                        if (count($friend) == 0) {
                            $inviter2 = "<div class='invitation btn btn-lg btn-primary' onclick='inviter($id2)'>Inviter</div>";
                        }
                        if (count($friend) != 0) {
                            $inviter2 = "<div class='invitation btn btn-lg btn-primary' onclick='discuss($id2)'>Discuter</div>";
                        }
                        $numero2 = '<input name="invitation_id" class="invisible" hidden="hidden" value="'.$id2.'" >';
                        $affiche2 ='<form class="know-content-direct"> '.$img. '<br>'.$nom2. '  ' . $prenom2 .'<br>  Alias ' .$pseudo2.' <br>'.$inviter2.$numero2.'</form>';

                        return $affiche2;

                    }
                }
            }
            else{
                global $errors;
                $errors[] = "Veuillez choisir votre type de recherche dans la boite à gauche de la barre de recherche";
            }

        }
    }
	
		
	
	

*/
















