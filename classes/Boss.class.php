<?php


/**
 * 
 */
class Boss extends Staff
{

	function __construct() {
		// if (Session::exists('staff')) {
		// 	# code...
		// }
		// die('You do not have access to this place');
	}
	
	public function addUser($params) {
		$return = (array) self::insert('staff', array('email' => $params['email'], 'access_type' => $params['access_type']));
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

	public function getUsers() {
		return self::get('staff', array());
	}

}