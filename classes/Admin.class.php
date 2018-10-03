<?php


/**
* 
*/
class Admin extends Staff
{

	public function getRooms() {
		return array_reverse(self::get('room', array()));
	}

	public function getCategory() {
		return self::get('categories', array());
	}

	public function addRoom($params) {
		return self::insert('room', $params);
	}

	public function addCategory($cat_params, $cat_amenities, $cat_images) {
		$return = array();
		$cat = self::insert('categories', $cat_params);
		if (count($cat)) {
			# code...
			$id = $cat[0]->id;
			$return['item'] = $cat[0];
			$img = array();
			$amenities = array();
			foreach ($cat_amenities as $key => $value) {
				# code...
				$return['image'][] = self::insert('category_amenities', array('category_id' => $id, 'amenity_id' => $value));
			}
			foreach (Utility::uploadMultipleImages($cat_images, 'image', '../view/img/') as $key => $path) ;{
				# code...
				$return['amenities'][] = self::insert('category_images', array('category_id' => $id, 'image' => $path));
			}
		}
		return $return;
	}

	public function addAmenity($params) {
		return self::insert('amenities', $params);
	}

	public function getAmenity() {
		return self::get('amenities', array());
	}

}