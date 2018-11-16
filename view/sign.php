<?php
// die;
echo "<pre>";
print_r(Input::getAll());
var_dump(!Input::exists());
die;
if (!Input::exists()) {
	# code...
	Redirect::to('home');
}
// echo "<pre>";
if(Input::has('_method')) {
	$g = new Guest;
	$params = Input::getAll();
	unset($params['_method']);
	if (Input::get('_method') == 'login') {
		# code...
		// print_r($params);
		$s = $g->login($params);
		var_dump($s);
	}
	if (Input::get('_method') == 'register') {
		# code...
		$s = $g->register(array('fullname' => Input::get('title'). ' ' . Input::get('fname'). ' ' . Input::get('lname'), 'email' => Input::get('email'), 'address' => Input::get('address'), 'city' => Input::get('city'), 'phone' => Input::get('phone'), 'country' => Input::get('country')));
	}
	if (isset($s) && $s) {
		# code...
		if (isset($_SERVER['HTTP_REFERER'])) {
			# code...
			Redirect::to($_SERVER['HTTP_REFERER']);
		} else {
			Redirect::to('home?registration=success');
		}
		
	}
} else {
	Redirect::to('home');
}