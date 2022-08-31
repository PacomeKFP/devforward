<?php require('../config/database.php');?>
<?php require('../includes/constants.php');?>
<script>livre = 1</script>
<?php

if (isset($_POST['valider'])){
    extract($_POST);
    global $db;
    $user = $_COOKIE['user'];
    
    if(isset($_FILES['photo']) and $_FILES['photo']['error']==0){
    	$photo = $_FILES['photo'];
    }
    else{
    	die("Erreur de chargement de la photo de profile");
    }
   	if($photo['size']>2000000){
   		die("Attaque par upload potentielle");
   	}
   	
   	
   			$infosfichier= pathinfo($photo['name']);
		$extension= $infosfichier['extension'];
		$extensions_autorisees= array('jpg', 'jpeg', 'gif', 'png');
		
			if(in_array(strtolower($extension), $extensions_autorisees)){
			$destination = getcwd().'/tmp/profils/'.$user.'.'.$extension;
			$destination = str_replace("\\", '/', $destination);
			move_uploaded_file($photo['tmp_name'], $destination);
			$loc = 'file:///D:/KFPCorp.com/'.$photo['name'];
			echo $loc;
			echo "<img src='";
			echo $destination;
			echo "'>";
			
			}else{
				die("Extension de fichier non autorisé Les extensions autorisée sont: jpg, jpeg, gif et png");
			}

    $ee = $user.'.'.$extension;
        if ($db->query("SELECT * FROM profil WHERE pseudo = '$user'")->rowCount()==0){
        
            $db->query("INSERT INTO profil VALUES ('$user', '$ville', '$pays', '$emploi', '$telephone', '$mail', '$biographie', '$ee')");
        }
        else{
            $re = $db->query("SELECT * FROM profil WHERE pseudo = '$user'");
            $donnees = $re->fetch();
            $pseudo1 = $donnees['pseudo'];
            $emploi1 = $donnees['emploi'];
            $ville1 = $donnees['ville'];
            $pays1 = $donnees['pays'];
            $compte1 = $donnees['compte'];
            $telephone1 = $donnees['telephone'];
            $biographie1 = $donnees['biographie'];
            
		    $db->query("UPDATE profil SET pseudo = '$user', photo='$ee' WHERE pseudo = '$user'");
            if ($emploi!=$emploi1 and trim($emploi)!=''){
                $db->query("UPDATE profil SET emploi = '$emploi' WHERE pseudo = '$user'");
            }
            if ($ville!=$ville1 and trim($ville)!=''){
                $db->query("UPDATE profil SET ville = '$ville' WHERE pseudo = '$user'");
            }
            if ($pays!=$pays1 and trim($pays)!=''){
            	$db->query("UPDATE profil SET pays = '$pays' WHERE pseudo = '$user'");
            }
            if ($telephone!=$telephone1 and trim($telephone)!=''){
            	$db->query("UPDATE profil SET telephone = '$telephone' WHERE pseudo = '$user'");
            }

           if ($mail!=$compte1 and trim($mail)!=''){
            	$db->query("UPDATE profil SET compte = '$mail' WHERE pseudo = '$user'");
            }
            if ($biographie!=$biographie1 and trim($biographie)!=''){
            	$db->query("UPDATE profil SET biographie = '$biographie' WHERE pseudo = '$user'");
            }
        }
    }

    ?>

    <script>
    	window.location="../index.php";	
    </script>
    
    