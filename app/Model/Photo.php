<?php 
    
    class Photo extends AppModel{
        
		
        public $belongsTo = array(
            'Room'=> array('className' => 'Room'),
            'Promotion'=> array('className' => 'Promotion'),
            'PlaceOfInterest'=> array('className' => 'PlaceOfInterest')
        );
        
        public $validate = array(
            'link' => array(
                    'maxLength'=>array(
                        'rule'=> array('maxLength', '45'),
                        'message' => 'The link can be only 45 characters long'
                    )
             ),
             'room_id' => array(
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
             ),
             'promotion_id' => array(
                 'naturalNumber'=>array(
                        'rule'=> 'naturalNumber',                  
                        'required'=> true,
                        'allowEmpty' => false
                  )
             )
            
        );

    }
?>