<?php

$this->menu=array(
  array('label'=>'Dashboard','icon' => 'icon-adjust', 'url'=>array('/admin'), 'active'=>isset($active['1']) ? true : false,),
   
    
    
    array('label'=>'People','icon' => 'icon-user', 'url'=>array('/user/profiles'), 'active'=>isset($active['2']) ? true : false,
        'items'=> array(
                array('label'=>'Employee', 'url'=>array('/hr/profiles'), 'active'=>isset($active['2.1']) ? true : false,),
                array('label'=>'Doctor', 'url'=>array('/hr/profiles/doctor'), 'active'=>isset($active['2.2']) ? true : false,),
                array('label'=>'Nurse', 'url'=>array('/hr/profiles/nurse'), 'active'=>isset($active['2.3']) ? true : false,),
                array('label'=>'Beautician', 'url'=>array('/hr/profiles/beautician'), 'active'=>isset($active['2.4']) ? true : false,),
                array('label'=>'Therapist', 'url'=>array('/hr/profiles/therapist'), 'active'=>isset($active['2.5']) ? true : false,),
            )
        ),

   
    
   
);

?>
