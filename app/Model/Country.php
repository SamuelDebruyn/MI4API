<?php 
    
    Class Country extends AppModel{
        
        public $hasMany = array(
            
            'Address'
        
        );
        
    }

?>