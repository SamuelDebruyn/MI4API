<?php 
    
    class Address extends AppModel{

        public $belongsTo = array(
            'PlaceOfInterest'=> array('className' => 'PlaceOfInterest'),
            'Country'=> array('className' => 'Country')
            
        );  
        
        
        
        public $hasMany = array(
            
            'User'=> array('className' => 'User')
        
        );
    }
?>