<?php

if(isset($_FILES['photo']) and $_FILES['photo']['error']==0){
	$chemin = getcwd();
	echo tmpfile();
	echo $chemin.'<br>';
	//echo print_r($_FILES);
	//echo $_FILES['photo']['tmp_dir'].' et '.$_FILES['photo']['type'];
	//echo "<img src = '$photo'>";
}
