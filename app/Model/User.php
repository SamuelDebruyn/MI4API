<?php 

	App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
    
    class User extends AppModel{
    	
		public function beforeSave($options = array()){
			parent::beforeSave($options);
			if(!empty($this->data['User']['password'])){
				$passwordHasher = new SimplePasswordHasher();
				$this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
        	}
        	return true;
    	}
        
		public function beforeSave($options = array()) {
			parent::beforeSave($options);
			if(!empty($this->data['User']['password'])){
				$passwordHasher = new SimplePasswordHasher();
        			$this->data['User']['digest_hash'] = DigestAuthenticate::password(
            		$this->data['User']['username'],
            		$this->data['User']['password'],
            		env('SERVER_NAME')
        		);
				$this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
        	}
        	return true;
    	}
		
    }

?>