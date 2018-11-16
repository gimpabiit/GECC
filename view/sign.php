<?php
if (!Input::exists()) {
	# code...
	Redirect::to('home');
}
if(Input::has('_method')) {
	$g = new Guest;
	$params = Input::getAll();
	unset($params['_method']);
	if (Input::get('_method') == 'login') {
		# code...
		$s = $g->login($params);
	}
	if (Input::get('_method') == 'register') {
		# code...
		$s = $g->register(array('fullname' => Input::get('fname'). ' ' . Input::get('lname'), 'email' => Input::get('email'), 'address' => Input::get('address'), 'city' => Input::get('city'), 'phone' => Input::get('phone'), 'country' => Input::get('country')));
	}
	if (isset($s) && $s) {
		# code...
		if (isset($_SERVER['HTTP_REFERER'])) {
			# code...
			Redirect::to($_SERVER['HTTP_REFERER']);
		} else {
			Redirect::to('home');
		}
		
	}
} else {
	Redirect::to('home');
}