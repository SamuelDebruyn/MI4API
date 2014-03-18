<?php 
    
    class Promotion extends AppModel{
        
        public $hasMany = array(
            
            'Photo'=> array('className' => 'Photo')
        
        );
        
    }

?>