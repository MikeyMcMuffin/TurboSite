<?php
class Config {
	//Iterates through a path for our Config array in init.php. Returns a value
	public static function get($path = null){
		if($path) {
			$config = $GLOBALS['config'];
			$path = explode('/', $path);

			//for iterate through array(path input) on config file. find the correct bit and return it
			foreach($path as $bit){
				if(array_key_exists($bit, $config)){
					$config = $config[$bit]; //if part of config is found change config to that part.
				} else {
					die("bit not found".escape($bit));
					//add throw an error page here
				}
			}
		}
		return $config;
	}
}