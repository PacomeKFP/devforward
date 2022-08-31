
function chercher() {

}
function test(){
    alert(user);
}
function inviteraa(a) {
    document.getElementById("inviter"+a).id="test";
    $("#test").load("functions/inviter.php?apel=inviter&id="+a).fadeIn("Slow");

    console.log("Envoyé ! à "+a);
}
function confirm(a) {
    document.getElementById("confirm"+a).id="test";
    $("#test").load("functions/confirm.php?apel=confirm&id="+a).fadeIn("Slow");
}
function discuss(a) {
    $("#center").load("functions/messages.php?apel=discuss&id="+a).fadeIn("Slow");
}
function viewInvitation() {
    document.getElementById("invitationsRecus").style.visibility=hidden;
    alert("papa");
    $("#center").load("partials/_invitations.php").fadeIn("Slow");
}
function cacher() {
    alert("papa");
}

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
