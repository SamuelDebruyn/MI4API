<?php 
    
    class UsersController extends AppController{
        
		public function index(){
			$users = $this->User->find('all');
        	$this->set(array(
            	'users' => $users,
            	'_serialize' => array('users')
        	));
		}
		
		public function view($id = null){
			$user = $this->User->findById($id);
			
			if(!$user)
				throw new NotFoundException();
			
       		$this->set(array(
            	'user' => $user,
            	'_serialize' => array('user')
        	));
		}
		
		public function edit($id = null){
			$this->User->id = $id;
			
			if(!$user)
				throw new NotFoundException();
			
        	if($this->User->save($this->request->data)) {
            	$this->response->statusCode(204);
        	} else {
				throw new BadRequestException();
        	}
		}
		
		public function delete($id = null){
			if ($this->User->delete($id)) {
            	$this->response->statusCode(204);
        	} else {
            	throw new BadRequestException();
        	}
		}
		
		public function add(){
			if($this->User->save($this->request->data)) {
            	$this->response->statusCode(204);
        	} else {
            	throw new BadRequestException();
        	}
		}
		
		public function login(){
			
		}
		
    }

?>