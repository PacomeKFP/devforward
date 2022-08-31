
<script>

function pu(a){
		var l = a.val().length;
		var b = document.getElementById("a").value, d ="";
		for(var i =0; i<l; i++){
			if(b[i]!=' '){
				d += b[i]
			}
		}
		return d.length;
}


function verifier(a, b){

		if(pu()<a){
		b.css({
			color:'red',
			borderColor:'red',
		});
	}else{
		b.css({
			color:'green',
			borderColor:'green',
		});
	}

}

//	var a = $("#center").load("functions/livre.php").fadeIn("Slow");
    var user =  USER_PSEUDO;
    
    var nbr_upload = 0;
    var e = 0;
    
    function recuperation(){
    	$("obj").load("functions/password.php").fadeIn("Slow");
    }
    function sendimg(){
    var interlocuteur = document.getElementById("interlocuteur").value;
    	$('#center').load('functions/imgsend.php?call=sendImage&interlocuteur='+interlocuteur).fadeIn('Slow');
    }
    function received(){
    var interlocuteur = document.getElementById("interlocuteur").value;
    	$('#center').load('functions/received.php?interlocuteur='+interlocuteur).fadeIn('Slow');	
    }
	function yess(){
		$('#center').load('functions/livre.php').fadeIn("slow");
	}
	
function add(){
e++;
document.getElementById('nbr').value++
	var $tt=$("#tt");
   	var $id = $("#id");
   	var $input = $("#inputs");
	var f = "<input type='file' class='file' id = 'file"+e+"'name = 'file[]'>";
	$input.append(f);
	$("#file"+e).trigger('click');
   	if(nbr_upload==0){

   	}   
   	var div = document.createElement("div");
   	div.append(file.value);
 	$tt.append(div);
 	alert(nbr_upload)
 	nbr_upload = nbr_upload+1;
 	$("#nbr").text(e);
 	$("#add").trigger("click");
}
	

    function text(text) {
        let fin = '';
        for (let i=0; i<=text.length; i++){
            let j = i + 1;
            let tmp = text.substring(i, j);
            if (tmp===' '){
                tmp='Â§*Â§';
            }
            fin = fin+tmp;
        }
        return fin;
    }

function sendmsg(a){

    if(nbr_upload!=0){
    document.getElementById("send").setAttribute("type", "submit");
    $('#input-t').attr("action")="functions/sendmsg.php?part=body&message="+text(txt)+"type=special";
    	$("#send").trigger("click");
    }else{
        var txt = document.getElementById("msgText").value;

        $("#msgBody").load("functions/sendmsg.php?part=body&inter="+a+"&message="+text(txt)).fadeIn("Slow");
        document.getElementById("msgText").value="";
     }
}


    function search() {
        $('#center').load('functions/search.php?apel=recherche&user='+user+'&text='+document.getElementById('search').value).fadeIn('Slow');
    }
    function viewInvitations() {
        document.getElementById("invitationsRecus").style.visibility='hidden';
        $("#center").load("partials/_invitations.php").fadeIn("Slow");
    }
    function viewMessages() {
        
        $("#center").load("partials/_messages.php").fadeIn("Slow");
        document.getElementById("messagesRecus").style.visibility='hidden';
    }

    function inviteraa(a) {
        document.getElementById("inviter"+a).id="test";
        $("#test").load("functions/inviter.php?apel=inviter&id="+a).fadeIn("Slow");

        console.log("EnvoyÃ© ! Ã  "+a);
    }
	
var livre=0;
</script>
<script></script>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!--<script !src="assets/js/script.js"></script>-->
    <meta content="IE-edge" http-equiv="X-UA-Compatible">
    <meta content="width = device-width, initial-scale = 1" name="viewport">
    <meta content="Reseau social pour developpeurs" name="description">
    <meta content="Pacome Fégué" name="author">
    
        <title>
        <?php echo isset($title)
            ? $title.' - ' .WEBSITE_NAME
            : WEBSITE_NAME.' - Simple, Rapide, Efficace !';

        ?>

    </title>
    <!-- Stylesheets  -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <!--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>-->
    <!--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
</head>

<body>

<?php require('_nav.php'); ?>

</body>

</html>
