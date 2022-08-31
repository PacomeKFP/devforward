    alert("Papa");
    function alerte(){
    	alert("Papa");
    }
function teke(){
    		//jQuery($("#id").trigger("Click"););
    		alert("vie");
    		$("#id").trigger("click");
    	}    	
    	
    	function disposer(){
    		alert(document.getElementById("id").value);
    		var img = document.createElement("img");
    		img.src="document.getElementById("id").value";
    		document.getElementById("#tt").innerHTML = img;
    	}


function clo(a) {
    console.log(a);
}
function text(text) {
    let fin = '';
    for (let i=0; i<=text.length; i++){
        let j = i + 1;
        let tmp = text.substring(i, j);
        if (tmp===' '){
            tmp='§';
        }
        fin = fin+tmp;
    }
}

