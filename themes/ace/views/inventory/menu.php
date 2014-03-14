<?php

$this->menu=array(
 array('label'=>'Dashboard','icon' => 'icon-cloud', 'url'=>array('/inventory'), 'active'=>isset($active['4']) ? true : false),
    array('label'=>'Product','icon' => 'icon-dashboard', 'url'=>array('/accounting/product'), 'active'=>isset($active['1']) ? true : false,
            'items'=> array(
               
                 array('label'=>'Supplier', 'url'=>array('/inventory/supplier'), 'active'=>isset($active['1.2']) ? true : false,),
                  array('label'=>'Input Product', 'url'=>array('/inventory/product/create'), 'active'=>isset($active['1.3']) ? true : false,),
                 array('label'=>'Master Product', 'url'=>array('/inventory/product'), 'active'=>isset($active['1.4']) ? true : false,),
                 array('label'=>'Stock Product', 'url'=>array('/inventory/product/stock'), 'active'=>isset($active['1.8']) ? true : false,),
                  array('label'=>'Product Package', 'url'=>array('/inventory/product/package'), 'active'=>isset($active['1.9']) ? true : false,),
                   array('label'=>'Treatment Package', 'url'=>array('/inventory/product/stock'), 'active'=>isset($active['1.10']) ? true : false,),
                 array('label'=>'Product Set', 'url'=>array('/inventory/product'), 'active'=>isset($active['1.5']) ? true : false,),
                   array('label'=>'Treatment Set', 'url'=>array('/inventory/product'), 'active'=>isset($active['1.6']) ? true : false,),
                    array('label'=>'Report', 'url'=>array('/inventory/product'), 'active'=>isset($active['1.7']) ? true : false,),

                //array('label'=>'Cabin', 'url'=>array('/inventory/product_cabin'), 'active'=>isset($active['1.2']) ? true : false,)
            )
        ),

    
 
    //array('label'=>'Treatment Package','icon' => 'icon-home', 'url'=>array('/accounting/treatmentpackage'), 'active'=>false),

    array('label'=>'In/Out','icon' => 'icon-film', 'url'=>array('#'), 'active'=>isset($active['3']) ? true : false,
            'items'=> array(
                    array('label'=>'Incoming', 'url'=>array('/inventory/incoming'), 'active'=>isset($active['3.1']) ? true : false,),
                    array('label'=>'Outgoing', 'url'=>array('/inventory/outgoing'), 'active'=>isset($active['3.2']) ? true : false, ),
					 array('label'=>'Incoming From Supplier', 'url'=>array('/inventory/incomingSupplier'), 'active'=>isset($active['3.3']) ? true : false, ),
            )
   ),


   
);

?>