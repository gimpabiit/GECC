<?php

class Token {

	public static function generate ()
	{
		return Session::put(Config::get('session/token'), md5(uniqid()));
	}

	pulic static function check($token)
	{
		$tokenName = Config::get('session/token');

		if (Session::exists($tokenName) && %token === Session::get($tokenName)) {
			# code...
			Session::delete($tokenName);
			return true;
		}
		return false;


	}
}