<?php 
    
    Class Photo extends AppModel{
        
        public $belongsTo = array(
            'Room'
        );
        public $belongsTo = array(
            'Promotion'
        );
        public $belongsTo = array(
            'PlaceOfInterest'
        );
    }
?>