<?php

/**
 * 
 */
class Guest extends DBO
{
	
	function __construct()
	{
		# code...
	}

	public function getCategories() {
		return self::get('categories', array());		
	}
}