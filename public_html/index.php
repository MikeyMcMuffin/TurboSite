<?php
require_once '../init/init.php';

if(Session::exists('home')) {
	echo '<p>' . Session::flash('home') . '</p>';
}

$user = new User();
if($user->isLoggedIn()){
?>

<?php

	if($user->hasPermission('admin')) {
	}
} else{
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Turbo Countdown</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
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

<script src="js/effects.js"></script>
<div class="main-background">
    <div class="gradient_1">

        <div class="logo">
            <img src="img/webvector.png" alt="sasa">
        </div>

        <div class="terminal-background">
            <div class="terminal-img">
                <img src="img/map.jpg" alt="placeholderMap" >
            </div>
            <div class="terminal-data">
                <h2>Next event</h2>
                <h1>Pax south 2018</h1>
                <h2>Mission begins in:</h2>
                <div id="timer"></div>
            </div>
        </div>

        <div class="container">

            <div class="help_div">

                <div class="btn_help">
                    <button class="btn_1">How does this work?</button>
                </div>

                <div class="help">

                    <h1>How to add an event:</h1>
                    <div class="intro">
                        <p>Simply fill in the form with the title and description of the event. Don't forget to add a date! Without it, the countdown doesn't work and boy do we want it to work cause we went through a lot of effort to get it working, you know what that timer was actually doing? It was a countdown for the next tf2 event but it wasn't doing anything so we took it.</p>
                    </div>
                </div>

            </div>

            <div class="post">
                <!-- Need to add, profile pic -->
                <div class="post_layout">
                    <div class="post_data">
                        <h1>Pax south 2018</h1>
                        <h2>Posted by: Mikey McMuffin</h2>
                        <p>Location: San Antonio, Texas</p>
                        <!-- maybe add picture of location? -->
                        <p>This is filler text, just ignore me, actually this might be a good way to take notes! So what i need to do, either add an actual img of the city where the event is or add a random img of SFM tf2 characters. Also add an inspect function on a map that redirects user to google maps?</p>
                        <p>Agents: ...</p>
                        <!-- show all other turbos that will join -->
                        <p>Date: 17/01/18</p>
                        <!-- show all other turbos that will join -->
                    </div>
                    <div class="post_map">
                        <img src="img/map.jpg" alt="placeholderMap" >
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<div class="bottom-background">
    <div class="gradient_2">

    </div>
</div>
<footer>
    <h1>Made by Mikey McMuffin &amp; Mijans</h1>
</footer>

</body>
</html>