<?php 
    
    class InformationController extends AppController{
    	
		public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('index', 'view');
		}
        
		public function index(){
			$this->view(1);
		}
		
		public function view($id = 1){
			$information = $this->Information->findById(1);

       		$this->set(array(
            	'information' => $information,
            	'_serialize' => array('information')
        	));
		}
		
		public function edit($id = 1){
			$this->Information->id = 1;
			
        	if($this->Information->save($this->request->data)) {
            	$this->response->statusCode(204);
        	} else {
				throw new BadRequestException();
        	}
		}
		
		public function delete($id = 1){
			throw new ForbiddenException();
		}
		
		public function add(){
			throw new ForbiddenException();
		}
		
    }

?>