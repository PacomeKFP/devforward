
	<!-- Scripts  -->


</body>
    <script type="text/javascript">
        function downloadJSAtOnload() {
            var element = document.createElement("script");
            element.src = "assets/js/script.js";
            document.body.appendChild(element);
            var element1 = document.createElement("script");
            element1.src = "assets/js/jQuery.js";
            document.body.appendChild(element1);
            var element2 = document.createElement("script");
            element2.src = "assets/js/bootstrap.min.js";
            document.body.appendChild(element2);
            var element3 = document.createElement("script");
            element3.src = "https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js";
            document.body.appendChild(element3);
            var element4 = document.createElement("script");
            element4.src = "https://oss.maxcdn.com/respond/1.4.2/respond.min.js";
            document.body.appendChild(element4);
        }
        if (window.addEventListener)
            window.addEventListener("load", downloadJSAtOnload, false);
        else if (window.attachEvent)
            window.attachEvent("onload", downloadJSAtOnload);
        else window.onload = downloadJSAtOnload;
		
        // function viewInvitations() {
        //     alert("pap");
        //     $("#center").load("partials/_invitations.php").fadeIn("Slow");
        // }

        
		var autoload = setInterval(function () {
            $('#idds').load('functions/functions.php').fadeIn("Slow");
			$('#aut').load('partials/_head.php #obj');
        }, 3000);
		
    </script>
<!--    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>-->
<!--    <script type="text/javascript"src="assets/js/bootstrap.min.js"></script>-->
    <input type="hidden" id="idds" style="visibility: hidden">
    <div onClick="yess()" id="yess"></div>
</html>
