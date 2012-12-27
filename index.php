
<script type="text/javascript">
function reloadClock(){

	//Update the clock image if one is on the page
	if (document.getElementById("clock")){
		document.getElementById("clock").src = 'clock.php?t='+ Math.random();
	}
	
	//Update timer  
	setTimeout("reloadClock()", 1000);
}

</script>

<img src="clock.php" alt="Current Time" id='clock' onload="reloadClock();"  > 

