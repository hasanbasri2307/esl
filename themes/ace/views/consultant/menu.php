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
    array('label'=>'Report','icon' => 'icon-flag', 'url'=>array('/consultant/report'), 'active'=>isset($active['4']) ? true : false,),
   
);

?>