<?php
require_once '../init/init.php';

$user = new User();
$user->logout();

Redirect::to('index.php');