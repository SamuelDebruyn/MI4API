<?php 
    
    class Photo extends AppModel{
        
		
        public $belongsTo = array(
            'Room'=> array('className' => 'Room'),
            'Promotion'=> array('className' => 'Promotion'),
            'PlaceOfInterest'=> array('className' => 'PlaceOfInterest')
        );

    }
?>