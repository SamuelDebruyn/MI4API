<?php 
    
    class RoomsController extends AppController{
        
		public function index(){
			$rooms = $this->Room->find('all');
        	$this->set(array(
            	'rooms' => $rooms,
            	'_serialize' => array('rooms')
        	));
		}
		
		public function view($id = null){
			$room = $this->Room->findById($id);
			
			if(!$room)
				throw new NotFoundException();
			
       		$this->set(array(
            	'room' => $room,
            	'_serialize' => array('room')
        	));
		}
		
		public function edit($id = null){
			$this->Room->id = $id;
			
			if(!$room)
				throw new NotFoundException();
			
        	if($this->Room->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
				throw new BadRequestException();
        	}
		}
		
		public function delete($id = null){
			if ($this->Room->delete($id)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
		public function add(){
			if($this->Room->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
    }

?>