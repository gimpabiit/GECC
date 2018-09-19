<?php 
/**
* 
*/
class Cookie
{
	
	function __construct() {
		# code...
	}

	public static function set($name, $value) {
		setcookie($name, $value, time() + 60 * 60 * 24 * 7 * 4, '/');
	}

	public static function exists($name) {
		return isset($_COOKIE[$name]);
	}

	public function get($name) {
		return $_COOKIE[$name];
	}

	public function getAll() {
		return $_COOKIE;
	}

	public static function delete($name) {
		setcookie($name, '', time() - 60 * 60 * 24 * 7 * 4);
	}
}