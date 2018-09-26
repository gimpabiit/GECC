<?php


/**
 * 
 */
class Room extends DBO
{
	private $self;
	private $category = null;
	function __construct($id)
	{
		# code...
		$this->self = self::get('room', array('id' => $id))[0];
	}

	public function checkFirst() {}


	public function getCategory() {
		if (is_null($this->category)) {
			# code...
			$this->category = self::get('categories', array('id' => $this->self->category_id))[0];
		}
		return $this->category->name;
	}

}