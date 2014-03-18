<?php 
    
    class OpeningHour extends AppModel{
        
        public $belongsTo = array(
            
            'PlaceOfInterest'=> array('className' => 'PlaceOfInterest')
        );
        public $validate = array(
         
           'start' => 'time',
           'end' => 'time',
           'weekday' => array(
                'naturalNumber'=>array(
                        'rule'=> 'naturalNumber',                  
                        'required'=> true,
                        'allowEmpty' => false
                        
                )
            ),
            'place_of_interest_id' => array(
                'naturalNumber'=>array(
                        'rule'=> 'naturalNumber',                  
                        'required'=> true,
                        'allowEmpty' => false
                        
                )
            )
            
        );
    }

?>