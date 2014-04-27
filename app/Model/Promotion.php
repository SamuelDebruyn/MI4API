<?php 
    
    class Promotion extends AppModel{
        
        public $hasMany = array(
            
            'Photo'=> array('className' => 'Photo')
        
        );
		
		public $belongsTo = array(
		
			'Room' => array('className' => 'Room')
		
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