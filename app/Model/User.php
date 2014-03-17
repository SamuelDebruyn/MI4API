<?php 

	App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
	App::uses('DigestAuthenticate', 'Controller/Component/Auth');
    
    class User extends AppModel{
        public $belongsTo = array(
            
            'Address'
        
        );
        
		public function beforeSave($options = array()) {
			parent::beforeSave($options);
			if(!empty($this->data['User']['password'])){
				$passwordHasher = new SimplePasswordHasher();
				$this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
        		$this->data['User']['digest_hash'] = DigestAuthenticate::password(
            		$this->data['User']['email'],
            		$this->data['User']['password'],
            		env('SERVER_NAME')
        		);
				return true;
        	}
			return false;        	
    	}
		
    }

?>