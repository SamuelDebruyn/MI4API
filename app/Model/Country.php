<?php 
    
    class Country extends AppModel{
        
        public $hasMany = array(
            
            'Address'=> array('className' => 'Address')
        
        );
        
    }

?>