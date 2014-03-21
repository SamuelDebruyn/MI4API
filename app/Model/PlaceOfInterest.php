<?php 
    
    class PlaceOfInterest extends AppModel{
        public $useTable = 'places_of_interest';
        
        public $hasMany = array(            

            'Photo'=> array(
            	'className' => 'Photo',
            	'foreignKey' => 'place_of_interest_id'
			),
            'OpeningHour'=> array(
            	'className' => 'OpeningHour',
				'foreignKey' => 'place_of_interest_id'
			),            
        );
          
        public $belongsTo = array(
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
             
             'telephone'=>array(
                'telephone' => array(
                    'rule' => array('phone', '/^[0-9-+()# ]{6,12}+$/')
                 ),
                 'maxLength'=>array(
                        'rule'=> array('maxLength', '45'),
                        'message' => 'The telephone can be only 45 characters long'
                  )
             ),
             
             'address_id' => array(
                'naturalNumber'=>array(
                        'rule'=> 'naturalNumber',                  
                        'required'=> true,
                        'allowEmpty' => false
                )
             ),
             'type' => array(
                'naturalNumber'=>array(
                        'rule'=> 'naturalNumber',                  
                        'required'=> true,
                        'allowEmpty' => false
                )
             ),

             
        
        
        );
        
        
    }

?>
