<?php

$this->menu=array(
  
    array('label'=>'Scan Client No','icon' => 'icon-dashboard', 'url'=>array('/frontdesk'), 'active'=>isset($active['1']) ? true : false,),
    array('label'=>'Client Information','icon' => 'icon-user', 'url'=>array('/frontdesk/client'), 'active'=>isset($active['2']) ? true : false,),
    
    array('label'=>'Room Schedule','icon' => 'icon-home', 'url'=>array('/frontdesk/schedule'), 'active'=>isset($active['3']) ? true : false,
            'items'=> array(
                array('label'=>'Room Name / Number', 'url'=>array('/inventory/product'), 'active'=>isset($active['3.1']) ? true : false,),
                 array('label'=>'Reservation', 'url'=>array('/inventory/product'), 'active'=>isset($active['3.2']) ? true : false,),
                  array('label'=>'Input', 'url'=>array('/inventory/product'), 'active'=>isset($active['3.3']) ? true : false,),
                 array('label'=>'Report', 'url'=>array('/inventory/product'), 'active'=>isset($active['3.4']) ? true : false,),
                 
                //array('label'=>'Cabin', 'url'=>array('/inventory/product_cabin'), 'active'=>isset($active['1.2']) ? true : false,)
            )
        ),
    /*
    array('label'=>'Product Information','icon' => 'icon-flag', 'url'=>array('/frontdesk/product'), 'active'=>isset($active['4']) ? true : false,),
   */
);

?>