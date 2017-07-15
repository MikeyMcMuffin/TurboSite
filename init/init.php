<?php
session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'DBhost' => '104.238.171.69',
		'DBusername' => 'superMuffin',
		'DBpassword' => 'yahoow00p',
		'DBname' => 'turbo_countdown'
	),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
	),
	'session' => array(
		session_name => 'user'
	)
);

spl_autoload_register(function($class){
	require_once '../classes/' . $class . '.php';
});

require_once '../functions/sanitize.php';