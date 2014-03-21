<?php 
    
    Class Room extends AppModel{
        public $hasMany = array(
            'Photo'=> array('className' => 'Photo')   
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
                'naturalNumber'=>array(
                        'rule'=> 'naturalNumber',                  

                )
             ),
             
         
         );
         
    }

?>