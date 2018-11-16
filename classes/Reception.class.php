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

	public function getClientInfo($rid) {
		return self::get('clients', array('id' => $rid));
	}

	public function checkIn($id) {
		return self::update('reservation', array('id' => $id), array('check_in' => 1, 'check_in_date' => date('Y-m-d')));
	}

	public function checkOut($user, $room) {
		return self::update('reservation', array('id' => $id), array('check_out' => 1, 'check_out_date' => date('Y-m-d')));
	}
}