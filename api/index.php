<?php 
require_once('../core/init.php');
Redirect::view('application/json');

$user = new User;
$g = new Guest();
$data = array();
$db = DB::getInstance();
$url = Input::getAll('get');

$router = new Router($url['url']);
$table = $router->pop();

// echo "<pre>";
// if (Input::exists('post')) {
// 		# code...
// 	// echo "All posts";
// 	var_dump(Input::getAll('post'));
// 	// var_dump();
// }
// if (Input::exists('file')) {
// 		# code...
// 	echo "all files";
// 	var_dump(Input::getAll('file'));
// }
// die;

if (Input::exists('post')) {
	# code...
	if (Input::has('_method')) {
		# code...
		$_method = Input::get('_method');
		$params = Input::getAll();
		$where = array('id' => $router->pop());
		unset($params['_method']);
		switch ($_method) {
			case 'checkAvailability':
				# code...
				$data[] = $g->checkRoomAvailability(Input::get('from_date'), Input::get('to_date'), Input::get('category'));
				break;
			case 'verify_account':
				# code...
				$data[] = (md5($params['email']) == $params['hash']) ? true : false;
				break;
		}
	}
	else {
		// echo('sign up intended');
		if ($router->hasJuice()) {
			# code...
			echo "error: go to 404 page";
		} else {
			// $data['form-data'] = Input::getAll();
			$db->get($table, Input::getAll());
			if (count($db->results())) {
				# code...
			} else {
				if ($db->insert($table, Input::getAll())) {
					# code...
					$db->get($table, Input::getAll());
					$data[] = $db->results();
				}
			}
		}
		
	}
}
elseif (Input::exists('get')) {
	# code...
	$array = array();
	if ($router->hasJuice()) {
		# code...
		if (is_double(count($router->getArr()) / 2)) {
			# code...
			$data[] = 'url undefined';
			
		} else {
			while ($router->hasJuice()) {
				# code...
				$array[$router->pop()] = $router->pop();
			}
		}
	}
	if ($table == 'make_order') {
		# code..
		$o = new Order;
		$o->createOrder($user->getId());
	} else {
		$db->get($table, $array);
	}
	$data[] = $db->results();
}


echo json_encode($data);