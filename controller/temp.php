<?php 
require_once('../core/init.php');
Redirect::view('application/json');

$user = new User;
// 
$data = array();
$db = DB::getInstance();
$url = Input::getAll('get');

$router = new Router($url['url']);
$table = $router->pop();

// echo "<pre>";
// echo "All posts";
// if (Input::exists('post')) {
// 	# code...
// 	var_dump(Input::getAll('post'));
// }
// echo "all files";
// if (Input::exists('file')) {
// 	# code...
// 	var_dump(Input::getAll('file'));
// }
// echo "all gets";
// if (Input::exists('get')) {
// 	# code...
// 	var_dump(Input::getAll('get'));
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
			case 'put':
				# code...
				if ($table == 'point') {
					# code...
					$db->query('UPDATE `point` SET `worth` = '.$params['worth']);
					$db->get('point');
				} else {
					if ($table == 'category') {
						# code...
						if (Input::exists('file')) {
							# code....
							$params['image'] = $user->uploadImage(Input::getAll('file'), 'image', '../img/categories/');
						} else {
							unset($params['image']);
						}
					}
					$data['where'] = $where;
					$data['params'] = $params;
					$db->update($table, $where, $params);
					$db->get($table, $where);
				}
				$data[] = $db->results();
				// echo "execute put request";
				break;
			
			case 'delete':
				# code...
				$data[] = $db->delete($table, $where);
				// $data[] = $db->delete($table, $where);
				// echo "execute delete request";
				break;

			case 'award_point':
				# code...
				$a = new Admin;
				$data[] = $a->awarduser($params['phone'], $params['point']);
				// $data[] = $db->delete($table, $where);
				// echo "execute delete request";
				break;

			case 'process_payment':
				# code...
				$d = new Delivery(Delivery::getUser());
				$data['delivery_process'] = $d->processPayment($params);
				// echo "execute delete request";
				break;

			case 'non-user-order':
				# code...
				$o = new Order;
				$params = $o->createNonUserOrder($params);
				$db->get($table, $params);
				$data[] = $db->results();
				break;

			case 'login':
				# code...
				$data['login'] = $user->logIn($params);
				break;

			case 'staff':
				# code...
				$staff = new Staff;
				$data['staffLogin'] = $staff->logIn($params);
				if (is_null($data['staffLogin'])) {
					# code...
					$GLOBALS['login_failure'] = 1;
					Redirect::to('/staffLogin');
				}
				break;

			case 'signup':
				# code...
				$data['signup'] = $user->signUp($params);
				break;

			case 'category':
				# code...
				if (Input::exists('file')) {
					# code...
					$params['image'] = $user->uploadImage(Input::getAll('file'), 'image', '../img/categories/');
					if (!is_array($params['image'])) {
						# code...
						if ($db->insert($table, $params)) {
							# code...
							$db->get($table, $params);
							$data['category'] = $db->results();
						}
					} else {
						$data['category'] = 0;
					}
					
				}
				break;

			case 'product':
				# code...
				if (Input::exists('file')) {
					# code...
					$params['image1'] = $user->uploadImage(Input::getAll('file'), 'image1', '../img/products/');
					$params['image2'] = $user->uploadImage(Input::getAll('file'), 'image2', '../img/products/');
					$params['image3'] = $user->uploadImage(Input::getAll('file'), 'image3', '../img/products/');
					if (!is_array($params['image1']) && !is_array($params['image2']) && !is_array($params['image3'])) {
						# code...
						if ($db->insert($table, $params)) {
							# code...
							$db->get($table, $params);
							$data['product'] = $db->results();
						}
					} else {
						$data['product'] = 0;
					}
					
				}
				break;

			case 'cart':
				# code...
				$data[] = $user->addToCart($params);
				break;

		}
	} else {
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