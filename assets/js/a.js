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
    
        function right(){
    
    var center = document.getElementById("centre");
    var right = document.getElementById("right");
    var left = document.getElementById("left");
    var roLeft = document.getElementById("rotLeft");
    var roRight = document.getElementById("rotRight");
    if(Nright==0){
    right.style.visibility="visible";
    var w = Ncenter-wR;
    Ncenter = w;
    center.style.width=w+unit;
    	roRight.style.transform="rotate(360deg)";
       	right.style.marginRight="0";
       	left.style.transition="0.8s";
       	Nright=1;
       //	$("#right").load("partials/_right.php").fadeIn("Slow");
       	//center.style.transition="0.8s";
     }else{
     right.style.visibility="hidden";
      w = Ncenter+wL;
     Ncenter = w;
     	roRight.style.transform="rotate(180deg)";
       	right.style.marginRight="60%";
       	roLeft.style.transform="rotate(360deg)";
       	center.style.width = w+unit;
	Nright=0;
     }
    }// JavaScript Document