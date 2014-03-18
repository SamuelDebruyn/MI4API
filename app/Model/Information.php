<?php 
    
    class Information extends AppModel{
        
         public $validate = array(
         
            'telephone'=>array(
                'telephone' => array(
                    'rule' => array('phone', '/^[0-9-+()# ]{6,12}+$/')
                 ),
                 'maxLength'=>array(
                        'rule'=> array('maxLength', '45'),
                        'required'=> true,
                        'allowEmpty' => false,
                        'message' => 'The telephone can be only 45 characters long'
                  )
             ),
             
             'cell_phone'=>array(
                 'cell_phone' => array(
                    'rule' => array('phone', '/^[0-9-+()# ]{6,12}+$/')
                  ),
                 'maxLength'=>array(
                    'rule'=> array('maxLength', '45'),
                    'required'=> true,
                    'allowEmpty' => false,
                    'message' => 'The cell phone can be only 45 characters long'
                 )
                 
             ),
             'email' => array(
                'email'=>array(
                    'rule'=>'email',
                    'required'=> true,
                    'allowEmpty' => false,
                )
             
             ),
             
             
            
         );
       
        
    }

?>