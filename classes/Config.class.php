<?php
/**
* 
*/
class Config
{
	
	function __construct()
	{
		# code...
	}
	public static function get($path = null)
	{
		if ($path)
		{
			# code...
			$config = $GLOBALS['config'];
			$path = explode('/', $path);
			foreach ($path as $key) {
				# code...
				if (isset($config[$key])) {
					# code...
					$config = $config[$key];
				}
			}
			return $config;
		}
		return false;
	}
}
?>