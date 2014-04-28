<?php 
    
    class Country extends AppModel{
    	
		public $recursive = -1;
        
        public $hasMany = array(
            
            'Address'=> array('className' => 'Address')
        
        );
        
        public $validate = array(
                
                'name' => array(
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '45'),
                        'required'=> true,
                        'allowEmpty' => false,                        
                        'message' => 'The name can be only 45 characters long'
                    )
                 ),
        );
        
    }

?>