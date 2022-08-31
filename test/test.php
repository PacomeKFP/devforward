<script src="../assets/js/jquery-3.3.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script>
    // var test=setInterval(function () {$('#load').load('data.php').fadeIn("Slow");},1000);
    var autoload = setInterval(function () {
        $('#load').load('data.php?text=pacome').fadeIn("Slow");
    }, 1000);

</script>
<div id="load" style="background-color: navajowhite;color: blue">

</div>
<div id="load2" style="background-color: navajowhite; color: blue">

</div>
<br><br>
<div id="test" onclick="test()" style="background-color: gray; width: 3cm; height: 3cm; ">

</div>
<div id="test2" onclick="test()" style="background-color: gray; width: 3cm; height: 3cm; ">

</div>
<script>
    // var test=setInterval(function () {$('#load').load('data.php').fadeIn("Slow");},1000);
    var autoload2 = setInterval(function () {
        $('#load2').load('data2.php?text=pacome').fadeIn("Slow");
    }, 1000);


</script>