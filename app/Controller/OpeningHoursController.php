<?php 
    
    class OpeningHoursController extends AppController{
        
		public function index(){
			$opening_hours = $this->OpeningHour->find('all');
        	$this->set(array(
            	'opening_hours' => $opening_hours,
            	'_serialize' => array('opening_hours')
        	));
		}
		
		public function view($id = null){
			$opening_hour = $this->OpeningHour->findById($id);
			
			if(!$opening_hour)
				throw new NotFoundException();
			
       		$this->set(array(
            	'opening_hour' => $opening_hour,
            	'_serialize' => array('opening_hour')
        	));
		}
		
		public function edit($id = null){
			$this->OpeningHour->id = $id;
        	if($this->OpeningHour->save($this->request->data)) {
            	$this->response->statusCode(204);
        	} else {
            	$this->response->statusCode(400);
        	}
		}
		
		public function delete($id = null){
			if ($this->OpeningHour->delete($id)) {
            	$this->response->statusCode(204);
        	} else {
            	$this->response->statusCode(400);
        	}
		}
		
		public function add(){
			if($this->OpeningHour->save($this->request->data)) {
            	$this->response->statusCode(204);
        	} else {
            	$this->response->statusCode(400);
        	}
		}
		
    }

?>