<?php 
    
    class Address extends AppModel{

        public $belongsTo = array(
            'Country'=> array('className' => 'Country') 
        );  
        public $hasMany = array(
            'User'=> array('className' => 'User'),
            'PlaceOfInterest'=> array('className' => 'PlaceOfInterest'),
            
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
                
                'address_line_1' => array(
                    
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '45'),
                        'required'=> true,
                        'allowEmpty' => false,                        
                        'message' => 'The address can be only 45 characters long'
                    )
                 ),
                'address_line_2' => array(
                    
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '45'),
                        'message' => 'The address can be only 45 characters long'
                    )
                ),
                'address_line_3' => array(
                    
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '45'),
                        'message' => 'The address can be only 45 characters long'
                    )
                ),
                
                'address_line_4' => array(
                    
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '45'),
                        'message' => 'The address can be only 45 characters long'
                    )
                ),
                
                'locality' => array(
                    
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '45'),
                        'message' => 'The locality can be only 45 characters long'
                    )
                 ),
                 'region' => array(
                    
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '45'),
                        'message' => 'The region can be only 45 characters long'
                    )
                 ),
                 
                 'zipcode' => array(
                    
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '45'),
                        'message' => 'The zipcode can be only 45 characters long'
                    ),
                    'zipcode' => array(
                        'rule' => array('postal', null, 'us')
                    )
                 ),
                 'country_id' => array(
                    
                    'naturalNumber'=>array(
                        'rule'=> 'naturalNumber',                  
                        'required'=> true,
                        'allowEmpty' => false
                        
                    )
                 )
               
        );
        
    }
?>