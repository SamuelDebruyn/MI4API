<?php 
    
    class AddressesController extends AppController{

		public function index(){
			$addresses = $this->Address->find('all');
        	$this->set(array(
            	'addresses' => $addresses,
            	'_serialize' => array('addresses')
        	));
		}
		
		public function view($id = null){
			$address = $this->Address->findById($id);
			
			if(!$address)
				throw new NotFoundException();
			
       		$this->set(array(
            	'address' => $address,
            	'_serialize' => array('address')
        	));
		}
		
		public function edit($id = null){
			$this->Address->id = $id;
        	if($this->Address->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
		public function delete($id = null){
			if ($this->Address->delete($id)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
		public function add(){
			if($this->Address->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
    }

?>