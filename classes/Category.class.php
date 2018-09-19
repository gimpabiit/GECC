<?php 

/**
* 
*/
class Category
{
	private $id;
	function __construct($id = null)
	{
		# code...
		if (!is_null($id)) {
			# code...
			$this->id = $id;
		}
	}

	public static function getAll() {
		self::dbc()->get('category');
		return self::dbc()->results();
	}

	public static function getName($id) {
		self::dbc()->get('category', array('id' => $id));
		return count(self::dbc()->results()) ? self::dbc()->results()[0]->name : 'unknown';
	}

	private static function dbc() {
		return DB::getInstance();
	}

}