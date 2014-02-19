<?php

$this->menu=array(
  
    array('label'=>'Order','icon' => 'icon-dashboard', 'url'=>array('/consultant/order'), 'active'=>isset($active['1']) ? true : false,
            'items'=> array(
                array('label'=>'Order List', 'url'=>array('/consultant/order'), 'active'=>isset($active['1.1']) ? true : false,),
                array('label'=>'Create Order', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['1.2']) ? true : false,),
            )
        ),
    
    array('label'=>'Client','icon' => 'icon-user', 'url'=>array('/consultant/client'), 'active'=>isset($active['2']) ? true : false,),
    array('label'=>'Treatment Rec','icon' => 'icon-home', 'url'=>array('/consultant/treatmentrec'), 'active'=>isset($active['3']) ? true : false,),
     array('label'=>'Room Schedule','icon' => 'icon-desktop', 'url'=>array('/consultant/order'), 'active'=>isset($active['4']) ? true : false,
            'items'=> array(
                array('label'=>'Room Name/number', 'url'=>array('/consultant/order'), 'active'=>isset($active['4.1']) ? true : false,),
                array('label'=>'Waiting List/Booking', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['4.2']) ? true : false,),
                array('label'=>'Input', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['4.3']) ? true : false,),
                array('label'=>'Report', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['4.4']) ? true : false,),
            )
        ),
    
   
);

?>