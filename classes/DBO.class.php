<?php

/**
* 
*/
class DBO
{
	
	protected static function dbc()
	{
		# code...
		return DB::getInstance();
	}

	protected static function get($table, $fields) {
		self::dbc()->get($table, $fields);
		if (self::dbc()->count()) {
			# code...
			return self::dbc()->results();
		} else {
			return array();
		}
	}

	protected static function insert($table, $fields) {
		self::dbc()->insert($table, $fields);
		return self::get($table, $fields);
	}

	protected static function update($table, $id, $fields) {
		self::dbc()->update($table, $id, $fields);
		return self::get($table, $id);
	}

	public static function runCurl($url) {
		$ch = curl_init();
		//Set the URL that you want to GET by using the CURLOPT_URL option.
		curl_setopt($ch, CURLOPT_URL, $_SERVER["REQUEST_SCHEME"].'://'.$_SERVER["SERVER_NAME"].'/api'.$url);
		
		//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 
		//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		 
		//Execute the request.
		$data = curl_exec($ch);
		 
		//Close the cURL handle.
		curl_close($ch);
		
		//Print the data out onto the page.
		return $data;
	}

	public function accessAPI($url) {
		return self::runCurl($url);
	}
}