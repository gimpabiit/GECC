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
		self::dbc()->get('categories');
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

	public function getAmenities() {

		if (is_null($this->data)) {
			# code...
			return array();
		} else {
			return self::get('category_amenities', array('category_id' => $this->id));
		}
	}

	public function getAmenityName($id) {
		return self::get('amenities', array('id' => $id))[0]->name;
	}

	public function getImages() {
		return self::get('category_images', array('category_id' => $this->id));
	}

	public function getPrice() {
		if (!is_null($this->data)) {
			# code...
			return $this->data->price;
		} else {
			self::dbc()->get('categories', array('id' => $id));
			return count(self::dbc()->results()) ? self::dbc()->results()[0]->price : '0.00';
		}
	}

	public function getAdult() {
		if (!is_null($this->data)) {
			# code...
			return $this->data->adult;
		} else {
			self::dbc()->get('categories', array('id' => $id));
			return count(self::dbc()->results()) ? self::dbc()->results()[0]->adult : '0.00';
		} 
	}

	public function getChild() {
		if (!is_null($this->data)) {
			# code...
			return $this->data->child;
		} else {
			self::dbc()->get('categories', array('id' => $id));
			return count(self::dbc()->results()) ? self::dbc()->results()[0]->child : '0.00';
		} 
	}

	public function getFeatures() {
		return self::get('amenities', array('category' => $this->id));
	}

	protected static function dbc() {
		return DB::getInstance();
	}

	public function getRooms() {
		if (!is_null($this->id)) {
			# code...
			return array();
		}
		$rooms = self::get('room', array('category_id' => $this->id));
		return count($rooms) ? $rooms : array();
	}

}