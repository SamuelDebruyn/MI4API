<?php 
    
    Class Room extends AppModel{
        public $hasMany = array(
            'Photo'=> array('className' => 'Photo')   
        );
    }

?>