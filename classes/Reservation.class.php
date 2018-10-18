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
		return $this->cap;
	}

	public function getFloor() {
		return $this->floor;
	}

	public function validate($room, $guests) {}
	
}