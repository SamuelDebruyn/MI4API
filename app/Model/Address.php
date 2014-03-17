<?php 
    
    class Address extends AppModel{

        public $belongsTo = array(
            'PlaceOfInterest'
        );  
        
        public $belongsTo = array(
            'Country'
        );   
        
        public $hasMany = array(
            
            'User'
        
        );
    }
?>