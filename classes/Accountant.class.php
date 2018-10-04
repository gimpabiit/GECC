<?php

/**
 * 
 */
class Accountant extends Staff
{
	
	function __construct() {
		if (!Session::exists('user_session_access') || Session::get('user_session_access') != 'accountant') {
			# code...
			Redirect::to('login');
		}
	}
}