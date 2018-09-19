<?php



class Router
{
	private $url;
	private $levels;

	function __construct($url) {
		# code...
		$this->url = $url;
		$this->parse($this->url);
	}

	private function parse($url) {
		$this->levels = array_reverse(explode('/', $url));
		if ($this->levels[0] == '') {
			# code...
			$this->removeNode(0);
			$this->url = implode('', array_reverse($this->levels));
		}
	}

	public function getArr() {
		return $this->levels;
	}

	public function hasJuice() {
		return (count($this->getArr()) > 0);
	}

	public function pop() {
		return array_pop($this->levels);
	}

	public function removeNode($x) {
		unset($this->levels[$x]);
	}

	public function checkRoute() {
		if ($this->url === 0) {
			# code...
			$this->url = 'home';
		}
		if ($this->url == 'cpanel/index') {
			# code...
			Redirect::to('home');
		}
		if ($this->url == 'cpanel/home') {
			# code...
			$this->url = 'cpanel/index';
		}
		if (strpos($this->url, 'cpanel') !== false) {
			# code...
			$this->url = ($this->url == 'cpanel') ? 'index.php' : str_replace('cpanel', 'admin', $this->url);
		}
		($this->url != 'index') ? : Redirect::to('home');  
		$untouched = $this->url;
		$this->url = 'view/'.$this->url;
		if ($this->url == 'view/admin/home') {
			# code...
			// echo "string";
			$path = 'view/admin/index';
		}
		if (strpos($this->url, '.')) {
			# code...
			$path = $this->url;
		} elseif ($this->url == false) {
			# code...
			$path = 'view/home.php';
		} elseif (strpos($this->url, 'api')) {
			# code...
			return $this->runAPI($this->url);
		} else {
			if (strpos($this->url, '.php') !== false) {
				# code...
				$path = 'view/404.php';
			}
			$path = file_exists($this->url.'.php') ? $this->url.'.php' : $this->url.'.html';
		}
		if ($path == 'view/index') {
			# code...
			$path = 'view/home.php';
		}
		$path = file_exists($path) ? $path : 'view/404.php';
		if (strpos($this->url, '.php') == true) {
			# code...
			Redirect::to(str_replace('.php', '', $untouched));
		}
		if (strpos($this->url, '.html') == true) {
			# code...
			$untouched = str_replace('admin/', '', str_replace('.html', '', $untouched));
			Redirect::to($untouched);
		}
		// var_dump($this->url);
		// echo "<br>";
		// var_dump($path);
		// die;
		require_once($path);
	}

	private function runAPI($params) {
		$ret = (Input::exists('get')) ? Input::getAll('get') : Input::getAll();
		// var_dump($ret);
		return $ret;
	}

	public function explodeUrl() {

		if (strpos(Input::get('url'), 'product') !== false) {
			# code...
			$url = $_SERVER["SERVER_NAME"].'/api/'.str_replace('product', 'product/id', Input::get('url'));
		} elseif (strpos(Input::get('url'), 'lecture') !== false) {
			# code...
			$url = $_SERVER["SERVER_NAME"].'/api'.str_replace('lecture', '', Input::get('url'));
		} elseif (strpos(Input::get('url'), 'checkout-single') !== false) {
			# code...
			$url = $_SERVER["SERVER_NAME"].'/api/product/id'.str_replace('checkout-single', '', Input::get('url'));
		} elseif (strpos(Input::get('url'), 'nonuser-order-complete') !== false) {
			# code...
			$url = $_SERVER["SERVER_NAME"].'/api/temp_user_order/order'.str_replace('nonuser-order-complete', '', Input::get('url'));
		}
		// echo $url;
		// echo "<br>";
		// echo Input::get('url');
		// die;
		$ch = curl_init();
		//Set the URL that you want to GET by using the CURLOPT_URL option.
		curl_setopt($ch, CURLOPT_URL, $url);
		//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		 
		//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		 
		//Execute the request.
		$data = curl_exec($ch);
		 
		//Close the cURL handle.
		curl_close($ch);
		
		//Print the data out onto the page.
		return $data;
	}
}