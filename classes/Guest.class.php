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

	public function makeReservation($category) {

	}

	public function isRegistered() {}

	public function checkRoomAvailability($from, $to, $category) {
		self::dbc()->query("SELECT * FROM `reservation` WHERE DATEDIFF('$from', `from_date`) < 0 AND DATEDIFF('$to', `from_date`) < 0 AND category_id = $category OR DATEDIFF('$from', `to_date`) > 0 AND DATEDIFF('$to', `to_date`) > 0 AND category_id = $category");
		$res = self::dbc()->results();
		if (count($res) > 0 && count(self::get('room', array('category_id' => $category))) == count($res)) {
			# code...
			return false;
		}
		return true;
	}

	public function getMaxOccupancy() {
		$max = 0;
		foreach ($this->getCategories() as $key => $value) {
			# code...
			$temp_max = $value->adult + $value->child;
			if ($temp_max > $max) {
				# code...
				$max = $temp_max;
			}
		}
		return $max;
	}

	public function register($params) {
		$return = self::insert('clients', $params);
		$link = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'http';
		$link .= '://'.$_SERVER['HTTP_HOST'].'/verify?hash='.md5($params['email']);
		$message = 'Click the following link to verify your email as a GECC Guest<br><b>If this is not meant for you</b>, ignore this.<br><a href="'.$link.'">Click here</a> to proceed or run the following url in your browser.<br>'.$link;
		Utility::sendMail('GECC Guest Account Email Verification', $params['email'], $message);
		return $return;
	}

	
	public function logIn($params) {
		$params['suspend'] = 0;
		$data = self::get('client', array('email' => $params['email']));
		if ($data != null) {
			# code...
			$data = $data[0];
			if (empty($data->password) && $data->verified === 0 && $data->suspended === 1) {
				# code...
				return false;
			}
			if (Pee::verify($params['password'], $data->password)) {
				# code...
				Session::put('session_user_email', $params['email']);
				Session::put('session_staff_name', $data->name);
				Session::put('user_session_id', $data->id);
				Session::put('user_session_access', $data->access_type);
			}
		} else {
			return false;
		}
		if ($this->hasLoggedIn()) {
			# code...
			$this->sendToPage($this->getUser());
			return true;

		}
		return null;
	}

	public function isLoggedIn() {

	}
}