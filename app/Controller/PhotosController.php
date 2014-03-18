<?php 
    
    class PhotosController extends AppController{
    	
		public function index(){
			$photos = $this->Photo->find('all');
        	$this->set(array(
            	'photos' => $photos,
            	'_serialize' => array('photos')
        	));
		}
		
		public function view($id = null){
			$photo = $this->Photo->findById($id);
			
			if(!$photo)
				throw new NotFoundException();
			
       		$this->set(array(
            	'photo' => $photo,
            	'_serialize' => array('photo')
        	));
		}
		
		public function edit($id = null){
			$this->Photo->id = $id;
        	if($this->Photo->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
		public function delete($id = null){
			if ($this->Photo->delete($id)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
		public function add(){
			if($this->Photo->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
    }

?>