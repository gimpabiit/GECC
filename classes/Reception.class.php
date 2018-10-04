<?php


/**
 * 
 */
class Reception extends Staff
{
	function __construct() {
		if (!Session::exists('user_session_access') || Session::get('user_session_access') != 'receptionist') {
			# code...
			Redirect::to('login');
		}
	}

	public function checkIn($user, $room) {

	}

	public function checkOut($user, $room) {

	}
}