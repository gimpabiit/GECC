<?php

/**
 * 
 */
class Reservation extends DBO
{
	private $cap;
	private $client = array();
	private $floor = null;

	function __construct() {
		self::dbc()->query('SELECT MAX(`to_date`) as `cap`, MIN(`from_date`) as `floor` FROM `reservation`');
		if (count(self::dbc()->results()[0])) {
			# code...
			$this->cap = self::dbc()->results()[0]->cap;
			$this->floor = self::dbc()->results()[0]->floor;
		}
	}

	public function checkDateAvailability($date) {

	}

	public function isMade($_date, $cat) {
		self::dbc()->query("SELECT * FROM `reservation` WHERE '{$_date}' between `from_date` and `to_date` and `category_id` = $cat");
		return count(self::dbc()->results());
	}

	public function getClientInfo($_date, $cat) {
		self::dbc()->query("SELECT * FROM `reservation` WHERE '{$_date}' between `from_date` and `to_date` and `category_id` = $cat");
		$client = self::dbc()->results()[0]->client_id;
		return self::get('clients', array('id' => $client))[0]->fullname;
	}

	public function getCap() {
		return date('Y-m-d');
	}

	public function getFloor() {
		return date('Y-m-d', time() - (10 * 24 * 60 * 60));
	}

	public function validate($room, $guests) {}

	public function getPrice($rid) {
		$r = self::get('reservation', array('id' => $rid));
		if (count($r) == 0) {
			# code...
			return false;
		} else {
			$r = $r[0];
		}
		$c = new Category($r->category_id);
		$fd = date_create($r->from_date);
		$td = date_create($r->to_date);
		$diff = date_diff($fd, $td)->days;
		$others = self::get('reception_billing', array('reservation' => $rid));
		return $diff * $c->getPrice() + Utility::addArr($others, 0, 'amount');
	}
	
}