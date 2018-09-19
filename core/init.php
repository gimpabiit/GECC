<?php
session_start();
// error_reporting(0);
$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => '',
		'db' => 'gecc_db'
		),
	'remember' => array(
		'cookie_name' => 'hash',
		'cookie_expiry' => 604800
		),
	'session' => array(
		'user' => ''
		)
	);
// require_once('../functions/sanitize.php');
spl_autoload_register(function($class) {
	require_once('../classes/'.$class.'.class.php');
});
?>