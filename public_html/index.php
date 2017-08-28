<?php
require_once '../init/init.php';

if(Session::exists('home')) {
	echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if($user->isLoggedIn()){
?>
	<p>Hello <a href="#">  <?php echo escape($user->data()->username); ?></a>!</p>

	<ul>
		<li><a href="logout.php">Log out</a></li>
		<li><a href="update.php">Update details</a></li>
	</ul>

<?php

	if($user->hasPermission('admin')) {
		echo '<p>You are a admin</p>';
	}
} else{
	echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register</a></p>';
}

>>>>>>> Feature-AdminLogin
?>
<!DOCTYPE html>
<html>
<head>
	<title>Turbo Countdown</title>
	<link rel="stylesheet" type="text/css" href="css/TurboSite.css">
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
<body>
<div class="container">

<header>
	<h1>Header image will go here</h1>
</header>

<div class="sideMenu">
	<a href="#" class="about"></a>
	<a href="#" class="gallery"></a>
	<a href="#" class="other"></a>
</div>

<div id="timer"></div>

<footer>
	Footer text will go here. Test boop.
</footer>

</div>
</body>
</html>