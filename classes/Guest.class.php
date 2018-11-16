<?php

/**
 * 
 */
class Guest extends DBO
{
	
	function __construct(){
		# code...
	}

	public function getCategories() {
		return self::get('categories', array());		
	}

	public function checkRoomAvailability($from, $to, $category) {
		self::dbc()->query("SELECT * FROM `reservation` WHERE DATEDIFF('$from', `from_date`) <= 0 AND DATEDIFF('$to', `to_date`) >= 0 AND category_id = 2 OR DATEDIFF('$from', `from_date`) <= 0 AND DATEDIFF('$to', `to_date`) <= 0 AND category_id = 2 OR DATEDIFF('$from', `from_date`) >= 0 AND DATEDIFF('$to', `to_date`) >= 0 AND category_id = 2");
		$res = self::dbc()->results();
		var_dump($res);
		die;
		if (count($res) >= 0 && count(self::get('room', array('category_id' => $category))) > count($res)) {
			# code...
			return true;
		}
		return false;
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
		$return = self::get('clients', $params);
		if (count($return)) {
			# code...
		} else {
			$return = self::insert('clients', $params);
		}
		$link = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'http';
		$link .= '://'.$_SERVER['HTTP_HOST'].'/verify?hash='.md5($params['email']);
		$message = 'Click the following link to verify your email as a GECC Guest<br><b>If this is not meant for you</b>, ignore this.<br><a href="'.$link.'">Click here</a> to proceed or run the following url in your browser.<br>'.$link;
		Utility::sendMail('GECC Guest Account Email Verification', $params['email'], $message);
		if (count($return)) {
			# code...
			Session::put('session_email', $params['email']);
			Session::put('session_name', $return[0]->fullname);
			Session::put('user_id', $return[0]->id);
		}
		return count($return) ? true : false;
	}

	public function logIn($params) {
		$params['suspend'] = 0;
		$data = self::get('client', array('email' => $params['email'], 'verified' => 1));
		if ($data != null) {
			# code...
			$data = $data[0];
			if (empty($data->password) && $data->verified === 0 && $data->suspended === 1) {
				# code...
				return false;
			}
			if (Pee::verify($params['password'], $data->password)) {
				# code...
				Session::put('session_email', $params['email']);
				Session::put('session_name', $data->name);
				Session::put('user_id', $data->id);
				return true;
			}
		} else {
			return false;
		}
		return null;
	}

	public function isSignedIn() {
		return Session::exists('user_id');
	}

	public function getKey() {
		return $this->isSignedIn() ? Session::get('user_id') : 0;
	}

	public function makeReservation($fd, $td, $c, $u = null) {
		$url = 'http://localhost/mail_template?email='.Input::get('email');
		$url .= '&title='.Input::get('title'). '&fname=' . Input::get('fname'). '&lname=' . Input::get('lname');
		$url .= '&phone='.Input::get('phone'). '&address=' . Input::get('address'). '&city=' . Input::get('city');
		$url .= '&cat='.Input::get('cat'). '&country=' . Input::get('country'). '&city=' . Input::get('city');
		$url .= '&from_date='.Input::get('from_date'). '&to_date=' . Input::get('to_date'). '&adult=' . Input::get('adult'). '&child=' . Input::get('child');
		if (is_null($u)) {
			# code...
			if ($this->getKey() == 0) {
				# code...
				return null;
			}
			$u = $this->getKey();
		}
		$return = self::get('reservation', array('from_date' => $fd, 'to_date' => $td, 'category_id' => $c, 'client_id' => $u));
		if (count($return)) {
			# code...
		} else {
			$return = self::insert('reservation', array('from_date' => $fd, 'to_date' => $td, 'category_id' => $c, 'client_id' => $u));
		}
		Utility::sendMail('GECC Reservation Invoice', Input::get('email'), file_get_contents($url));
	}

	public function verify($email, $password) {
		$c = self::get('clients', array('email' => $email));
		if (count($c)) {
			# code...
			self::update('clients', array('id' => $c[0]->id), array('password' => Pee::hide($password), 'verified' => 1));
			return $this->login(array('email' => $email, $password => 'password'));
		}
		return true;
	}
}