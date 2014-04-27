<?php 
    
    class CountriesController extends AppController{
    	
		public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow("index", "view");
		}
        
		public function index(){
			$countries = $this->Country->find('all');
        	$this->set(array(
            	'countries' => $countries,
            	'_serialize' => array('countries')
        	));
		}
		
		public function view($id = null){
			$country = $this->Country->findById($id);
			
			if(!$country)
				throw new NotFoundException();
			
       		$this->set(array(
            	'country' => $country,
            	'_serialize' => array('country')
        	));
		}
		
		public function edit($id = null){
			$this->Country->id = $id;
			
			if(!$country)
				throw new NotFoundException();
			
        	if($this->Country->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
				throw new BadRequestException();
        	}
		}
		
		public function delete($id = null){
			if ($this->Country->delete($id)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
		public function add(){
			if($this->Country->save($this->request->data)) {
            	$this->response->statusCode(204);
            	$this->autoRender = false;
        	} else {
            	throw new BadRequestException();
        	}
		}
		
    }

?>