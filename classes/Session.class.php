<?php

/**
* 
*/
class Session {

	function __construct()
	{
		# code...
	}

	public static function put($name, $value)
	{
		$_SESSION[$name] = $value;
		return $_SESSION[$name];
	}

	public static function exists($name)
	{
		return isset($_SESSION[$name]) ? true : false;
	}

	public static function delete($name)
	{
		if (self::exists($name)) {
			# code...
			unset($_SESSION[$name]);
		}
	}

	public static function get($name)
	{
		return self::exists($name) ? $_SESSION[$name] : null;
	}

	public static function flash($name, $string)
	{
		if (self::exists($name)) {
			# code...
			$session = self::get($name);
			self::delete(($name));
			return $session;
		}
		else {
			self::put($name, $string);
		}
		return '';
	}
	
	public static function destroy(){
		session_destroy();
	}
}