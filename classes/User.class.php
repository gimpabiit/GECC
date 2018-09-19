<?php


/**
* 
*/
class User extends DBO
{
	private $id;
	
	function __construct($user = null) {
		# code...
		if ($user == null) {
			# code...
			if (Session::exists('id')) {
				# code...
				$this->id = Session::get('id');
			} else {
				$this->id = false;
			}
		} else {
			$this->id = $user;
		}
	}

	public function logIn($params = array()) {
		$data = self::get('user', array('email' => $params['email']));
		if ($data != null) {
			# code...
			if (Pee::verify($params['password'], $data[0]->password)) {
				# code...
				Session::put('email', $params['email']);
				Session::put('phone', $data[0]->phone);
				Session::put('name', $data[0]->name);
				Session::put('id', $data[0]->id);
				Cookie::set('email', $params['email']);
				Cookie::set('name', $data[0]->name);
				Cookie::set('uid', $data[0]->uid);

				return true;
			}
		}
		return false;
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
			self::dbc()->update('user', $params, array('uid' => md5(self::get('user', $params)[0]->id)));
			Session::put('signup_success', 'true');
			$login = $this->login(array('email' => $params['email'], 'password' => $iniPass));
			return $login;
		}
	}

	public function array_contains($arr, $val) {
		foreach ($arr as $key => $value) {
			# code...
			if ($value === $val) {
				# code...
				return true;
			}
		}
		return false;
	}

	public function addToCart($params) {
		if ($this->array_contains($params, 0)) {
			# code...
			return false;
		}
		$params['user'] = $this->getId();
		$params2 = $params;
		unset($params2['quantity']);
		if (count(self::get('cart', $params2))) {
			# code...
			self::dbc()->update('cart', $params2, array('quantity' => self::get('cart', $params2)[0]->quantity + $params['quantity']));
			return self::get('cart', $params2);
		}
		return self::insert('cart', $params);	
	}

	public function addToWishlist($params) {
		$params['user'] = $this->id;
		$list_item = self::get('wishlist', $params);
		if (count($list_item)) {
			# code...
			return true;
		}
		return self::insert('wishlist', $params);
	}

	public function checkPriviledges() {
		if (!$this->hasLoggedIn()) {
			# code...
			if (isset($_GET['url'])) {
				# code...
				if (strpos($_GET['url'], 'cart') !== false ||strpos($_GET['url'], 'order') !== false ||strpos($_GET['url'], 'checkout') !== false || strpos($_GET['url'], 'edit-account') !== false) {
					# code...
					if (strpos($_GET['url'], 'nonuser') !== false  || strpos($_GET['url'], 'single') !== false ) {
						# code...
					} else {
						Redirect::to('/login');
					}
					// die;
				}
			}
		} else if (!isset($_GET['url']) || strpos($_GET['url'], 'login') !== false) {
			# code...
			Redirect::to('/home');
		}
	}

	public function hasLoggedIn() {
		return Session::exists('id'); 
	}

	public static function logout() {
		Session::delete('email');
		Session::delete('id');
		Session::delete('name');
		Cookie::delete('email');
		Cookie::delete('id');
		Cookie::delete('name');
	}

	public static function getId() {
		if (self::hasLoggedIn()) {
			# code...
			return Session::get('id');
		}
		return false;
	}

	public function getEmail() {
		return self::get('user', array('id' => $this->getId()))[0]->email;
	}

	public function getName() {
		return self::get('user', array('id' => $this->getId()))[0]->name;
	}

	public function getLocation() {
		return self::get('user_location', array('user' => $this->id));
	}

	public function getCartItems() {
		return self::get('cart', array('user' => $this->id));
	}

}