<?php

class PlacesOfInterestController extends AppController {

	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this -> loadModel("PlaceOfInterest");
		$this -> Auth -> allow("index", "view", "nearby");
	}

	public function index() {
		$places_of_interest = $this -> PlaceOfInterest -> find('all');
		$this -> set(array('places_of_interest' => $places_of_interest, '_serialize' => array('places_of_interest')));
	}

	public function view($id = null) {
		$place_of_interest = $this -> PlaceOfInterest -> findById($id);

		if (!$place_of_interest)
			throw new NotFoundException();

		$this -> set(array('place_of_interest' => $place_of_interest, '_serialize' => array('place_of_interest')));
	}

	public function edit($id = null) {
		$this -> PlaceOfInterest -> id = $id;

		if (!$place_of_interest)
			throw new NotFoundException();

		if ($this -> PlaceOfInterest -> save($this -> request -> data)) {
			$this -> response -> statusCode(204);
			$this -> autoRender = false;
		} else {
			throw new BadRequestException();
		}
	}

	public function delete($id = null) {
		if ($this -> PlaceOfInterest -> delete($id)) {
			$this -> response -> statusCode(204);
			$this -> autoRender = false;
		} else {
			throw new BadRequestException();
		}
	}

	public function add() {
		if ($this -> PlaceOfInterest -> save($this -> request -> data)) {
			$this -> response -> statusCode(204);
			$this -> autoRender = false;
		} else {
			throw new BadRequestException();
		}
	}

	public function nearby($latitude = 0, $longitude = 0, $range = 50.0) {
			
		if(!is_numeric($range))
			$range = 50.0;
		
		if (!is_numeric($latitude))
			$latitude = 0;

		if (!is_numeric($longitude))
			$longitude = 0;

		if ($latitude == 0 || $longitude == 0) {
			$this -> set(array('places_of_interest' => array(), '_serialize' => array('places_of_interest')));
			return;
		}

		$db = $this->PlaceOfInterest->getDataSource();
		$places_of_interest = $db -> fetchAll('
			
				SELECT
					PlaceOfInterest.id,
					111.045* DEGREES(ACOS(COS(RADIANS(:latpoint))
                 		* COS(RADIANS(Address.latitude))
                 		* COS(RADIANS(:longpoint) - RADIANS(Address.longitude))
                 		+ SIN(RADIANS(:latpoint))
                		* SIN(RADIANS(Address.latitude)))) AS DistanceInKm
				FROM places_of_interest PlaceOfInterest
				INNER JOIN addresses Address
				ON PlaceOfInterest.address_id = Address.id
				WHERE Address.latitude
					BETWEEN :latpoint  - (:range / 111.045)
						AND :latpoint  + (:range / 111.045)
					AND Address.longitude
						BETWEEN :longpoint - (:range / (111.045 * COS(RADIANS(:latpoint))))
        				AND :longpoint + (:range / (111.045 * COS(RADIANS(:latpoint))))
				ORDER BY DistanceInKm
			
			', array(
				'latpoint' => $latitude,
				'longpoint' => $longitude,
				'range' => $range
			));
		
		if(!$places_of_interest)
			$places_of_interest = array();
			
		$this -> set(array('places_of_interest' => $places_of_interest, '_serialize' => array('places_of_interest')));
	}

}
?>