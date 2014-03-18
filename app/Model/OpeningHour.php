<?php 
    
    class OpeningHour extends AppModel{
        
         public $belongsTo = array(
            
            'PlaceOfInterest'=> array('className' => 'PlaceOfInterest')
        );
        
        
    }

?>