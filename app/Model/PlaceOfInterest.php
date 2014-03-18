<?php 
    
    class PlaceOfInterest extends AppModel{
        
        public $hasMany = array(
            
            'Photo'=> array('className' => 'Photo'),
            'OpeningHour'=> array('className' => 'OpeningHour')
            
        );
        
        public $hasOne = 'Address';
        
        
    }

?>