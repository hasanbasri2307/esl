<?php

$this->menu=array(
    array('label'=>'Product','icon' => 'icon-dashboard', 'url'=>array('/accounting/product'), 'active'=>isset($active['1']) ? true : false,
            'items'=> array(
                array('label'=>'Product', 'url'=>array('/accounting/product'), 'active'=>isset($active['1.1']) ? true : false,),
                array('label'=>'Inventory', 'url'=>array('/accounting/inventory'), 'active'=>isset($active['1.2']) ? true : false,),
            )
        ),
   array('label'=>'Promo','icon' => 'icon-dashboard', 'url'=>array('/accounting/promo'), 'active'=>isset($active['2']) ? true : false,
            'items'=> array(
                    array('label'=>'Product Package', 'url'=>array('/accounting/promo_product'), 'active'=>isset($active['2.1']) ? true : false,),
                    array('label'=>'Treatment Package', 'url'=>array('/accounting/promo_treatment'), 'active'=>isset($active['2.2']) ? true : false, ),
                    array('label'=>'Product Treatment Package', 'url'=>array('/accounting/promo_product_treatment'), 'active'=>isset($active['2.3']) ? true : false, ),
            )
   ),
    //array('label'=>'Treatment Package','icon' => 'icon-home', 'url'=>array('/accounting/treatmentpackage'), 'active'=>false),

    array('label'=>'In/Out','icon' => 'icon-dashboard', 'url'=>array('#'), 'active'=>isset($active['3']) ? true : false,
            'items'=> array(
                    array('label'=>'Incoming', 'url'=>array('/accounting/incoming'), 'active'=>isset($active['3.1']) ? true : false,),
                    array('label'=>'Outgoing', 'url'=>array('/accounting/outgoing'), 'active'=>isset($active['3.2']) ? true : false, ),
            )
   ),
   
);

?>