<?php
/**
* 
*/
class Input
{
	
	function __construct()
	{
		# code...
	}

	public static function exists($type = 'post')
	{
		switch ($type) {
			case 'post':
				# code...
			return (!empty($_POST)) ? true : false;
				break;
			
			case 'get':
				# code...
			return (!empty($_GET)) ? true : false;
				break;

			case 'file':
				# code...
			return (!empty($_FILES)) ? true : false;
				break;

			default:
				# code...
			return false;
				break;
		}
	}

	public static function get($item)
	{
		if (isset($_POST[$item])) {
			# code...
			return $_POST[$item];
		} elseif (isset($_GET[$item])) {
			# code...
			return $_GET[$item];
		} else {
			return 0;
		}
	}

	public function set($type, $name, $value) {
		if ($type == 'post') {
			# code...
			$_POST[$name] = $value;
		}
		if ($type == 'get') {
			# code...
			$_GET[$name] = $value;
		}
	}

	public static function has($item)
	{
		if (isset($_POST[$item]) || isset($_GET[$item])) {
			# code...
			return true;
		} else {
			return false;
		}
	}

	public static function getAll($type = 'post')
	{
		$array = array();

		if ($type == 'post') {
			# code...
			$array = $_POST;
		} elseif ($type == 'get') {
			# code...
			$array = $_GET;
		} elseif ($type == 'file') {
			# code...
			$array = $_FILES;
		}

		return $array;
	}
	
}
?>