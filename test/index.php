
<?php 

	define('DB_HOST', 'localhost');
	define('DB_NAME', 'boom');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');	

	try{
	
		$db = new PDO("mysql: host =".DB_HOST."; dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);
		
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	
	}catch(PDOException $e){
	
		die('Erreur: '. $e->getMessage());
		
	}
	$re = $db->query("SELECT * FROM amis WHERE etat = 1 and envoyeur = 'Dev03' or etat = 1 and recepteur = 'Dev03' ORDER BY temps DESC");
	while($donnees=$re->fetch()){
		extract($donnees);
		 echo $envoyeur . '<br>';
	}
	
	echo time();
	