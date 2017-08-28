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
		'session_name' => 'user',
		'token_name' => 'token'
	)
);

spl_autoload_register(function($class){
	require_once '../classes/' . $class . '.php';
});

require_once '../functions/sanitize.php';

if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
	$hash = Cookie::get(Config::get('remember/cookie_name'));
	$hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

	if($hashCheck->count()) {
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}
}
