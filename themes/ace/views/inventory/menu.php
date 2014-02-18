<?php

$this->menu=array(
    array('label'=>'Product','icon' => 'icon-dashboard', 'url'=>array('/accounting/product'), 'active'=>isset($active['1']) ? true : false,
            'items'=> array(
                array('label'=>'Inventory', 'url'=>array('/inventory/product'), 'active'=>isset($active['1.1']) ? true : false,),
                //array('label'=>'Cabin', 'url'=>array('/inventory/product_cabin'), 'active'=>isset($active['1.2']) ? true : false,)
            )
        ),
 
    //array('label'=>'Treatment Package','icon' => 'icon-home', 'url'=>array('/accounting/treatmentpackage'), 'active'=>false),

    array('label'=>'In/Out','icon' => 'icon-dashboard', 'url'=>array('#'), 'active'=>isset($active['3']) ? true : false,
            'items'=> array(
                    array('label'=>'Incoming', 'url'=>array('/inventory/incoming'), 'active'=>isset($active['3.1']) ? true : false,),
                    array('label'=>'Outgoing', 'url'=>array('/inventory/outgoing'), 'active'=>isset($active['3.2']) ? true : false, ),
            )
   ),
   
);

?>