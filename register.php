<?php require('config/database.php');?>
<?php require('includes/functions.php');?>
<?php require('includes/encodings.php');?>
<?php require('includes/constants.php');?>

	<?php
setcookie("memlove", "papa", time()-500);
$_COOKIE[]=[];
	$transfert=false;
	//Si le formulaire a été soumis
	if(isset($_POST['register']))  {
	
	extract($_POST);
	
	
		// si tous les champs ont été remplis
		if(not_empty($name, $pseudo, $email, $password, $password_confirm, $prenom, '', $date)){
			
				$errors = array();//tableau d'érreurs
				
				
				//determiner le timestamp de la date de naissance du visiteur pour avoir son age exact
				$lengh = mb_strlen($date);
				$year = mb_substr($date, 0, 4);
				$month = mb_substr($date, 3, 5);
				$month = mb_substr($month, 2, 2);
				$day = mb_substr($date, 8);
				$timestamp_naissance = mktime(23, 59, 59, $month, $day, $year);
				$timestamp_actuel = time();
				$age = ($timestamp_actuel - $timestamp_naissance)/WEBSITE_MINIMUM_AGE_DIVISOR;
								 //441 504 000 secondes pour être acepté
								 //31 536  000 est le diviseur
					if (2004<$year){
                        $errors[] = "Vous êtes trop jeune pour posseder un compte (minimum 2004)";

					}

				
				if(mb_strlen($pseudo) < 3){
				
				$errors[] = "Pseudo trop court (Minimum 3 caractères)";
				
				} 
				
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$errors[] = "Adresse Email invalide!";

				}
				
				if(mb_strlen($password) < 6){
				
				$errors[] = "Mot de passe trop court (Minimum 6 caractères)";
				
				}else{
				
					if($password != $password_confirm){
						$errors[] = "Les deux mots de passe ne concordent pas!";
					}
				
				}
				
				if(is_already_in_use('email', $email, 'has')){
					$errors[] = "E-mail deja utilisé";
				}
				
				if(is_already_in_use('pseudo', $pseudo, 'has')){
					$errors[] = "Pseudo deja utilisé";
				}
				
				if(count($errors) == 0){
					//Envoyer un mail d'activation
					$to = $email;
					$subject = WEBSITE_NAME." - ACTIVATION DE COMPTE";
					$token = sha1($pseudo.$email.$password);
					$pin = $timestamp_actuel;
					
					ob_start();
					require('templates/emails/activation.tmpl.php');
					$content = ob_get_clean();
					$content .= '<br>Vous utiliserez ce code '. $pin .'comme clé pour vous connecter à votre compte en cas d\'oubli de votre mot de passe'; 
					$headers = 'MIMI-Version: 1.0'."\r\n";
					$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
					
					//mail($to, $subject, $content, $headers);
					
					//echo "Mail d'activation envoyé!";
					
					//ajout d'utilisateur à la bd
					
					global $db;
					echo $pin;
						//TODO enregistrer le visiteur via l'objet PDO

					$photo = WEBSITE_DEFAULT_PROFIL;
					$db->query("INSERT INTO has VALUES('0', '$name', '$prenom', '$pseudo', '$email', '$password', '$date', '$sexe', '', '$pin', '$photo', '$pin')");
					//rediriger le visiteur sur sa page de profile
					$reponse = $db->query("SELECT * FROM has WHERE pseudo = '$pseudo'");
					$ligne = $reponse->fetch();

                    $id=$ligne['id'];
					$expire = time() + 3600*24*31*6;
                    setcookie("memlove", "$id", $expire);
                    session_start();
                    $_SESSION["memlove"]=$id;
                   $js = '	<script>
								var date = new Date();
								var time = date.getTime();
								date.setTime(time+3600*24*31*6*1000);
								var expire = date.toGMTString();
								var valeur = "'.$id.'";
								var name = "memlove=";
								var exp = "; expires="+expire;
								document.cookie = name + valeur +exp;
								window.location = "http://localhost/DevForward/user.php";
 							</script>';
                    setcookie("nbr_connect", 0, time()+3600);
					//$pacome ='<script>window.location = "http://localhost/Perso/user.php"</script>';
					echo $js;

				}

				
			}else{
				
				$errors[] = "Veillez remplir tous les champs";
			}
	}
	
	?>




	
	<?php require('views/register.view.php'); ?>
