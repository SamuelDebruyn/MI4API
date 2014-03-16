<?php 
    
    Class Photo extends AppModel{
        
        public $belongsTo = array(
            'Room'
        );
    }
?>