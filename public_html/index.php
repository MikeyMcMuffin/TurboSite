<?php
require_once '../init/init.php';

$user = DB::getInstance()->get('users', array('username', '=', 'muffin')); 

if(!$user->count()){
	echo 'No user';
}else{
	foreach($user->results() as $user) {
		echo $user->username, '<br>';
	}
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
            <div class="terminal-data">
                <h1>test</h1>
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
                <h1>Pax south 2018</h1>
                <h2>Posted by: Mikey McMuffin</h2>
                <p>Location: San Antonio, Texas</p>
                <!-- maybe add picture of location? -->
                <p>Mission: To have a good time in texas!</p>
                <p>Agents: ...</p>
                <!-- show all other turbos that will join -->
                <p>Date: 17/01/18</p>
                <!-- show all other turbos that will join -->
            </div>

            <div class="post">
                <!-- Need to add, profile pic -->
                <h1>Gamescon 2378</h1>
                <h2>Posted by: Mijans</h2>
                <p>Location: Keulen, Germany</p>
                <!-- maybe add picture of location? -->
                <p>Mission: Run around Germany and play some TF2 during gamescon!</p>
                <p>Agents: ...</p>
                <!-- show all other turbos that will join -->
                <p>Date: 22/08/78</p>
                <!-- show all other turbos that will join -->
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