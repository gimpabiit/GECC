<?php


/**
 * 
 */
class Staff extends DBO
{
	private $user_session_id;
	
	function __construct($user = null) {
		# code...
		if ($user == null) {
			# code...
			if (Session::exists('user_session_id')) {
				# code...
				$this->user_session_id = Session::get('user_session_id');
			}
		} else {
			$this->user_session_id = $user;
		}
		// var_dump($this->user_session_id);
		// die;
	}

	public function logIn($params = array()) {
		// Session::destroy();
		$params['suspend'] = 0;
		$data = self::get('staff', $params);
		if ($data != null) {
			// var_dump($data);
			# code...
			// if (Pee::verify($params['password'], $data[0]->password)) {
				# code...
				Session::put('session', $params['email']);
				Session::put('name', $data[0]->name);
				Session::put('user_session_id', $data[0]->id);
			// }
		}
		if ($this->hasLoggedIn()) {
			# code...
			$this->sendToPage($this->getUser());
			return true;

		}
		return null;
	}

	public function signUp($params = array()) {
		$iniPass = $params['password'];
		if (isset($params['password'])) {
			# code...
			$params['password'] = Pee::hide($params['password']);
		}
		self::dbc()->insert('user', $params);
		if (!self::dbc()->error()) {
			# code...
			$login = $this->login(array('email' => $params['email'], 'password' => $iniPass));
			return $login;
		}
	}

	public function hasLoggedIn() {
		// echo Session::get('user_session_id');
		// die;
		return Session::exists('user_session_id'); 
	}

	public function sendToPage($id) {
		$permission = self::get('staff', array('id' => $id))[0]->user_type;
		// $allowed $_SERVER['REQUEST_URI'];
		$url;
		switch ($permission) {
			case 'admin':
				# code...
				$url = '/admin/points-info';
				break;
			
			case 'agent':
				# code...
				$url = '/agent/orders';
				break;
			
			case 'operations':
				# code...
				$url = '/operations/points';
				break;
			
			case 'dispatch':
				# code...
				$url = '/delivery/deliveries';
				break;

			// default:
			// 	# code...
			// 	break;
		}
		Redirect::to($url);
	}

	public static function getUser() {
		if (Session::exists('user_session_id')) {
			# code...
			return Session::get('user_session_id');
		}
		return null;
	}

	public function verifyUserAccess() {
		if ($this->hasLoggedIn()) {
			# code...
			$user = self::get('staff', array('id' => $this->getUser()))[0]->user_type;
			// echo $user;
			// die;
			if ($user == 'admin') {
				# code...
				if (strpos($_SERVER['REQUEST_URI'], 'admin') === false) {
					# code...
					Redirect::to('/admin/points-info');
				}
			}
			if ($user == 'agent') {
				# code...
				if (strpos($_SERVER['REQUEST_URI'], 'agent') === false) {
					# code...
					Redirect::to('/agent/orders');
				}
			}
			if ($user == 'operations') {
				# code...
				if (strpos($_SERVER['REQUEST_URI'], 'operations') === false) {
					# code...
					Redirect::to('/operations/points');
				}
			}
			if ($user == 'dispatch') {
				# code...
				if (strpos($_SERVER['REQUEST_URI'], 'delivery') === false) {
					# code...
					Redirect::to('/delivery/deliveries');
				}
			}
		} else {
			echo "<h1>You Do Not Have Permission To Access This Page<br><a href='/stafflogin'>Go Home</a>";
			// echo Session::get('user_session_id');
			die;
		}
	}

}