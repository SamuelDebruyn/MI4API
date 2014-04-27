<?php 
    
    class PromotionsController extends AppController{
    	
		public function beforeFilter(){
			parent::beforeFilter();
			$this->allow("index", "view");
		}
        
		public function index(){
			$promotions = $this->Promotion->find('all');
        	$this->set(array(
            	'promotions' => $promotions,
            	'_serialize' => array('promotions')
        	));
		}
		
		public function view($id = null){
			$promotion = $this->Promotion->findById($id);
			
			if(!$promotion)
				throw new NotFoundException();
			
       		$this->set(array(
            	'promotion' => $promotion,
            	'_serialize' => array('promotion')
        	));
		}
		
		public function edit($id = null){
			$this->Promotion->id = $id;
			
			if(!$promotion)
				throw new NotFoundException();
			
        	if($this->Promotion->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
				throw new BadRequestException();
        	}
		}
		
		public function delete($id = null){
			if ($this->Promotion->delete($id)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
		public function add(){
			if($this->Promotion->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
    }

?>