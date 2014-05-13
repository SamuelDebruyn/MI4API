<?php 
    
    class Room extends AppModel{
    	
		public $recursive = 2;
		
        public $hasMany = array(
            'Photo'=> array('className' => 'Photo'),
            'Promotion' => array('className' => 'Promotion')   
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
             
             'type' => array(
                'naturalNumber'=>array(
                        'rule'=> 'naturalNumber',                  
                        'required'=> true,
                        'allowEmpty' => false
                )
             ),
             
             'price' => array(
                'decimalNumber'=>array(
                        'rule'=> array('decimal', 2),                  
                        'required'=> true,
                        'allowEmpty' => false
                )
             )             
         
         );
         
    }

?>