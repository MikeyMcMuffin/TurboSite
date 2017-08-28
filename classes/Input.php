<?php
class Input {
	public static function exists($type = 'post'){ //Checks if data has been submitted wvia POST or GET form submission
		switch($type) {
			case 'post':
				return (!empty($_POST)) ? true : false;
			break;
			case 'get':
				return (!empty($_GET)) ? true : false;
			break;
			default:
				return false;
			break;
		}
	}

	public static function get($item){ //gets Item from form
		if(isset($_POST[$item])){
			return $_POST[$item];
		} else if(isset($_GET[$item])){
			return $_GET[$item];
		}
		return '';
	}
}