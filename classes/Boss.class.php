<?php


/**
 * 
 */
class Boss extends Staff
{

	function __construct() {
		if (!Session::exists('user_session_access') || Session::get('user_session_access') != 'super-administrator') {
			# code...
			Redirect::to('login');
		}
	}
	
	public function addUser($params) {
		$return = (array) self::insert('staff', array('email' => $params['email'], 'name' => $params['name'], 'access_type' => $params['access_type']));
		$link = isset($_SERVER['REQUEST_SCHEME']) ? $_SERVER['REQUEST_SCHEME'] : 'http';
		$link .= '://'.$_SERVER['HTTP_HOST'].'/cpanel/verify?hash='.md5($params['email']);
		$message = 'Click the following link to verify your email as a GECC Employee<br><b>If this is not meant for you</b>, ignore this.<br><a href="'.$link.'">Click here</a> to proceed or run the following url in your browser.<br>'.$link;
		// return $message;
		// die;
		$return['mailed'] = Utility::sendMail('GECC Employee Email Verification', $params['email'], $message);
		return $return;
	}

	public function suspendUser($params = array()) {
		$id = $params['id'];
		unset($params['id']);
		self::dbc()->update('staff', array('id' => $id), array('suspended' => '1'));
		return self::get('staff', array('id' => $id));
	}

	public function getUserCount() {
		
	}

	public function getStatus($user) {
		$status = 'Unverified';
		if (count($user) && $user->verified) {
			# code...
			$status = ($user->suspended) ? 'Suspended' : 'Active';
		}
		return $status;
	}

	public function getEmployees() {
		return array_reverse(self::get('staff', array()));
	}

}