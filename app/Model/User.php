<?php 

	App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
    
    class User extends AppModel{
    	
		
        public $belongsTo = array('Address');
        
		public function beforeSave($options = array()) {
			parent::beforeSave($options);
        	if(isset($this->data['User']['password'])){
            	$passwordHasher = new SimplePasswordHasher();
            	$this->data['User']['password'] = $passwordHasher->hash($this->data['User']['password']);
				return true;
        	}
        return false;
    	}
        
        public $validate = array(
        
            'email' => array(
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '255'),
                        'required'=> true,
                        'allowEmpty' => false,
                        'message' => 'The email can be only 255 characters long'
                    )
             ),
             'password' => array(
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '40'),
                        'required'=> true,
                        'allowEmpty' => false,
                        'message' => 'The password can be only 255 characters long'
                    )
             ),
             'reset' => array(
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '40'),
                        'message' => 'The reset-password can be only 255 characters long'
                    )
             ),
             'address_id' => array(
                'naturalNumber'=>array(
                        'rule'=> 'naturalNumber',                  
                        'required'=> true,
                        'allowEmpty' => false
                )
             ),
             
        );
        
		
    }

?>