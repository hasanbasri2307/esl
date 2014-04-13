<?php

$this->menu=array(
  array('label'=>'Dashboard','icon' => 'icon-cloud', 'url'=>array('/accounting'), 'active'=>isset($active['6']) ? true : false),
    array('label'=>'Point','icon' => 'icon-dashboard', 'url'=>array('/consultant/order'), 'active'=>isset($active['1']) ? true : false,
            'items'=> array(
                array('label'=>'Product', 'url'=>array('/consultant/order'), 'active'=>isset($active['1.1']) ? true : false,),
                array('label'=>'Treatment', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['1.2']) ? true : false,),
                array('label'=>'Report', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['1.2']) ? true : false,),
            )
        ),
    
    array('label'=>'Pricing','icon' => 'icon-filter', 'url'=>array('/accounting/product'), 'active'=>isset($active['2']) ? true : false,
            'items'=> array(
                array('label'=>'Product Price', 'url'=>array('/accounting/product'), 'active'=>isset($active['2.1']) ? true : false,),
                 array('label'=>'Treatment Price', 'url'=>array('/accounting/treatment'), 'active'=>isset($active['2.2']) ? true : false,),
                  array('label'=>'Product Package Price', 'url'=>array('/accounting/productpackage'), 'active'=>isset($active['2.3']) ? true : false,),
				  array('label'=>'Treatment Package Price', 'url'=>array('/accounting/treatmentpackage'), 'active'=>isset($active['2.4']) ? true : false,),
                 array('label'=>'Voucher', 'url'=>array('/inventory/product'), 'active'=>isset($active['2.5']) ? true : false,),
                  array('label'=>'Report', 'url'=>array('/inventory/product'), 'active'=>isset($active['2.6']) ? true : false,),
                   
                //array('label'=>'Cabin', 'url'=>array('/inventory/product_cabin'), 'active'=>isset($active['1.2']) ? true : false,)
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
