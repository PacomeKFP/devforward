<?php $title = 'Votre profil'?>
<?php include("partials/_header.php"); ?>
<div id="contentAll">
	<div id="head">
		<?php include('partials/_head.php'); ?></div>
	<div id="left">
		<?php include('partials/_left.php'); ?></div>
	<div id="centre">
		<img class="rotate-left" id="rotLeft" onclick="left()" src="assets/image/New_Folder/fleche.png">
		
		<div id="center"><div id="paco"></div>
			<?php include('functions/livre.php'); ?>
	</div>
	</div>
	<div id="right">
		<?php include('partials/_right.php'); ?>
	</div>
</div>
<?php include('partials/_footer.php'); ?>
<script>

	 var Nleft = 0, Nright=0, Ncenter=90;
	 var wL = 30, wR = 30, wC = 90, unit = "%";
    function left(){
    
    var center = document.getElementById("centre");
    var right = document.getElementById("right");
    var left = document.getElementById("left");
    var roLeft = document.getElementById("rotLeft");
    var roRight = document.getElementById("rotRight");
    if(Nleft==0){
    
   	var w = wC-wL;
   	Ncenter =w; 
    	centre.style.width=w+unit;
    	roLeft.style.transform="rotate(180deg)";
       	left.style.marginLeft="1%";
       	left.style.transition="0.8s";
       	Nleft=1;
       	//center.style.transition="0.8s";
     }else{
     w = Ncenter+wL;
     Ncenter = w;
     	roLeft.style.transform="rotate(180deg)";
       	left.style.marginLeft="-60%";
       	left.style.transition="0.8s";
       	center.style.width = w+unit;
       	roLeft.style.transform="rotate(-360deg)";
	Nleft=0;
     }
    }

</script>
