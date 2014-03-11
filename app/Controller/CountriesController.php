<?php 
    
    class CountriesController extends AppController{
        
		public function index(){
			$countries = $this->Country->find('all');
        	$this->set(array(
            	'countries' => $countries,
            	'_serialize' => array('countries')
        	));
		}
		
		public function view($id = null){
			$country = $this->Country->findById($id);
       		$this->set(array(
            	'country' => $country,
            	'_serialize' => array('country')
        	));
		}
		
		public function edit($id = null){
			$this->Country->id = $id;
        	if($this->Country->save($this->request->data)) {
            	$message = 'Saved';
        	} else {
            	$message = 'Error';
        	}
        	$this->set(array(
            	'message' => $message,
            	'_serialize' => array('message')
        	));
		}
		
		public function delete($id = null){
			if ($this->Country->delete($id)) {
            	$message = 'Deleted';
        	} else {
            	$message = 'Error';
        	}
        	$this->set(array(
           		'message' => $message,
           		'_serialize' => array('message')
        	));
		}
		
		public function add(){
			if($this->Country->save($this->request->data)) {
            	$message = 'Created';
        	} else {
            	$message = 'Error';
        	}
        	$this->set(array(
            	'message' => $message,
            	'_serialize' => array('message')
        	));
		}
		
    }

?>