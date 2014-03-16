<?php 
    
    class PromotionsController extends AppController{
        
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
        	} else {
				$this->response->statusCode(400);
        	}
		}
		
		public function delete($id = null){
			if ($this->Promotion->delete($id)) {
            	$this->response->statusCode(204);
        	} else {
            	$this->response->statusCode(400);
        	}
		}
		
		public function add(){
			if($this->Promotion->save($this->request->data)) {
            	$this->response->statusCode(204);
        	} else {
            	$this->response->statusCode(400);
        	}
		}
		
    }

?>