<?php

$this->menu=array(
  array('label'=>'Dashboard','icon' => 'icon-adjust', 'url'=>array('/admin'), 'active'=>isset($active['1']) ? true : false,),
   
    
    
    array('label'=>'People','icon' => 'icon-user', 'url'=>array('/user/profiles'), 'active'=>isset($active['2']) ? true : false,
        'items'=> array(
                array('label'=>'Employee', 'url'=>array('/user/profiles'), 'active'=>isset($active['2.1']) ? true : false,),
                array('label'=>'Doctor', 'url'=>array('/user/profiles/doctor'), 'active'=>isset($active['2.2']) ? true : false,),
                array('label'=>'Nurse', 'url'=>array('/user/profiles/nurse'), 'active'=>isset($active['2.3']) ? true : false,),
                array('label'=>'Beautician', 'url'=>array('/user/profiles/beautician'), 'active'=>isset($active['2.4']) ? true : false,),
                array('label'=>'Therapist', 'url'=>array('/user/profiles/therapist'), 'active'=>isset($active['2.5']) ? true : false,),
            )
        ),

   
    
   
);

?>
