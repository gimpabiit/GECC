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

	public function logIn($params) {
		// Session::destroy();
		$params['suspend'] = 0;
		$data = self::get('staff', array('email' => $params['email']));
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

	public function verify($params) {
		return (array) self::get('staff', array('email' => $params['email'], 'verified' => 0));

		// return self::dbc()->update('staff', array('id' => $params['id']), array('verified' => 1, 'password' => Pee::hide($params['pass'])));
	}

	public static function logout() {
		Session::destroy();
		Redirect::to('login');
	}

	public function signUp($params = array()) {
		$iniPass = $params['password'];
		if (isset($params['password'])) {
			# code...
			$params['password'] = Pee::hide($params['password']);
			$params['verified'] = 1;
		}
		// var_dump($params);
		// $staff = get('staff')[0]->id;

		self::dbc()->update('staff', array('email' => $params['email']), $params);
		die;
		if (!self::dbc()->error()) {
			# code...
			$login = $this->login(array('email' => $params['email'], 'password' => $iniPass));
			return $login;
		}
	}

	public function hasLoggedIn() {
		return Session::exists('user_session_id'); 
	}

	public function sendToPage($id) {
		$permission = self::get('staff', array('id' => $id))[0]->access_type;
		// $allowed $_SERVER['REQUEST_URI'];
		$url;
		switch (strtolower($permission)) {
			case 'accountant':
				# code...
				$url = '/cpanel/accounts';
				break;
			
			case 'receptionist':
				# code...
				$url = '/cpanel/reception';
				break;
			
			case 'super-administrator':
				# code...
				$url = '/cpanel/home';
				break;
			
			case 'administrator':
				# code...
				$url = '/cpanel/administrator';
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