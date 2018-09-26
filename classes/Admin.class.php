<?php


/**
* 
*/
class Admin extends Staff
{

	function __construct() {

	}

	public function getRooms() {
		return array_reverse(self::get('room', array()));
	}

	public function getCategory() {
		return self::get('categories', array());
	}

	public function addRoom($params) {
		return self::insert('room', $params);
	}

	public function addCategory($params) {
		return self::insert('categories', $params);
	}

}