<?php 

/**
* 
*/
class Category extends DBO
{
	private $id;
	private $data;
	function __construct($id = null)
	{
		# code...
		if (!is_null($id)) {
			# code...
			$this->id = $id;
			$this->data = self::get('categories', array('id' => $id))[0];
		} else {
			$this->data = null;
		}
	}

	public static function getAll() {
		self::dbc()->get('category');
		return self::dbc()->results();
	}

	public function getName($id = null) {
		if (!is_null($this->data)) {
			# code...
			return $this->data->name;
		} else {
			self::dbc()->get('categories', array('id' => $id));
			return count(self::dbc()->results()) ? self::dbc()->results()[0]->name : 'unknown';
		}
	}

	public function getDescription($id = null) {
		if (!is_null($this->data)) {
			# code...
			return $this->data->description;
		} else {
			self::dbc()->get('categories', array('id' => $id));
			return count(self::dbc()->results()) ? self::dbc()->results()[0]->description : 'unknown';
		}
	}

	public function getImages() {

	}

	public function getFeatures() {}

	protected static function dbc() {
		return DB::getInstance();
	}

}