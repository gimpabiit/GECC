<?php

/**
* 
*/
class Redirect
{
	
	function __construct()
	{
		# code...
	}

	public static function to($location)
	{
		if ($location) {
			# code...
			header('Location: '.$location);
		}

	}

	public static function view($header) {
		header('Content-type: '.$header);
	}
}