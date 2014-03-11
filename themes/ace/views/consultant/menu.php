<?php

$this->menu=array(
  
    array('label'=>'Order','icon' => 'icon-dashboard', 'url'=>array('/consultant'), 'active'=>isset($active['1']) ? true : false,
            'items'=> array(
                array('label'=>'Order List', 'url'=>array('/consultant/order'), 'active'=>isset($active['1.1']) ? true : false,),
                array('label'=>'Create Order', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['1.2']) ? true : false,),
            )
        ),
    
    
    array('label'=>'Client','icon' => 'icon-user', 'url'=>array('/consultant/client'), 'active'=>isset($active['2']) ? true : false,
            'items'=> array(
                array('label'=>'List Client', 'url'=>array('/consultant/client'), 'active'=>isset($active['2.1']) ? true : false,),
                array('label'=>'Input', 'url'=>array('/consultant/client/create'), 'active'=>isset($active['2.2']) ? true : false,),
                array('label'=>'Historycal', 'url'=>array('/consultant/client/history'), 'active'=>isset($active['2.3']) ? true : false,),
               
            )
        ),
    array('label'=>'Treatment Rec','icon' => 'icon-home', 'url'=>array('/consultant/treatmentrec'), 'active'=>isset($active['3']) ? true : false,),
     array('label'=>'Room Schedule','icon' => 'icon-desktop', 'url'=>array('/consultant/order'), 'active'=>isset($active['4']) ? true : false,
            'items'=> array(
               
                 array('label'=>'Reservation', 'url'=>array('/consultant/schedule'), 'active'=>isset($active['4.2']) ? true : false,),
                  array('label'=>'Input', 'url'=>array('/consultant/schedule/create'), 'active'=>isset($active['4.3']) ? true : false,),
                 array('label'=>'Report', 'url'=>array('/inventory/product'), 'active'=>isset($active['4.4']) ? true : false,),
            )
        ),
   
    array('label'=>'Sales','icon' => 'icon-bar-chart', 'url'=>array('/consultant/order'), 'active'=>isset($active['5']) ? true : false,
            'items'=> array(
                array('label'=>'Day/Week/Month', 'url'=>array('/consultant/order'), 'active'=>isset($active['5.1']) ? true : false,),
                array('label'=>'Consultant', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['5.2']) ? true : false,),
                array('label'=>'Product', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['5.3']) ? true : false,),
                array('label'=>'Treatment', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['5.4']) ? true : false,),
                array('label'=>'Void', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['5.5']) ? true : false,),
                array('label'=>'Claim', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['5.6']) ? true : false,),
                array('label'=>'Report', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['5.7']) ? true : false,),
            )
        ),
    
   
);

?>
