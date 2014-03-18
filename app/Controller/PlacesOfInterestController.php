<?php 
    
    class PlacesOfInterestController extends AppController{
        
		public function index(){
			$places_of_interest = $this->PlaceOfInterest->find('all');
        	$this->set(array(
            	'places_of_interest' => $places_of_interest,
            	'_serialize' => array('places_of_interest')
        	));
		}
		
		public function view($id = null){
			$place_of_interest = $this->PlaceOfInterest->findById($id);
			
			if(!$place_of_interest)
				throw new NotFoundException();
			
       		$this->set(array(
            	'place_of_interest' => $place_of_interest,
            	'_serialize' => array('place_of_interest')
        	));
		}
		
		public function edit($id = null){
			$this->PlaceOfInterest->id = $id;
			
			if(!$place_of_interest)
				throw new NotFoundException();
			
        	if($this->PlaceOfInterest->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
				throw new BadRequestException();
        	}
		}
		
		public function delete($id = null){
			if ($this->PlaceOfInterest->delete($id)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
		public function add(){
			if($this->PlaceOfInterest->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
    }

?>