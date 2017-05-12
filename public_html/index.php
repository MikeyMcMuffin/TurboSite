<!DOCTYPE html>
<html>
<head>
	<title>Turbo Countdown</title>
	<link rel="stylesheet" type="text/css" href="/css/TurboSite.css">
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.countdown.css"> 
	<script type="text/javascript" src="js/jquery.plugin.js"></script> 
	<script type="text/javascript" src="js/jquery.countdown.js"></script>
	<script language="javascript" type="text/javascript">
	$(document).ready(function (){
		$(timer).countdown({
			until: new Date(2020, 8-1, 8),
			padZeros: true
		});
	});
	</script>
</head>

<div id="timer"></div>

<div class="sideMenu">
	<a href="#" class="about"></a>
	<a href="#" class="gallery"></a>
	<a href="#" class="other"></a>
</div>

</html>