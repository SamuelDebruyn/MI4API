<?php 
    
    class Promotion extends AppModel{
        
        public $hasMany = array(
            
            'Photo'=> array('className' => 'Photo')
        
        );
        
         public $validate = array(
         
            'description' => array(
                'required'=> true,
                'allowEmpty' => false
             ),
            
            'room_id' => array(
                'naturalNumber'=>array(
                        'rule'=> 'naturalNumber',                  
                )
             ),
             
             
             
                     
         );
        
    }

?>