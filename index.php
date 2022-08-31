<?php


    if(isset($_COOKIE['memlove'])){
        $pacome ='<script>window.location = "user.php"</script>';
        echo $pacome;
    }else{
        require('views/index.view.php');
    }

	
	

 