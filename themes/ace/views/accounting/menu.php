<?php

$this->menu=array(
  array('label'=>'Dashboard','icon' => 'icon-cloud', 'url'=>array('/accounting'), 'active'=>isset($active['6']) ? true : false),
   
    
    array('label'=>'Pricing','icon' => 'icon-filter', 'url'=>array('/accounting/product'), 'active'=>isset($active['2']) ? true : false,
            'items'=> array(
                array('label'=>'Product Price', 'url'=>array('/accounting/product'), 'active'=>isset($active['2.1']) ? true : false,),
                 array('label'=>'Treatment Price', 'url'=>array('/accounting/treatment'), 'active'=>isset($active['2.2']) ? true : false,),
                  array('label'=>'Product Package Price', 'url'=>array('/accounting/productpackage'), 'active'=>isset($active['2.3']) ? true : false,),
				  array('label'=>'Treatment Package Price', 'url'=>array('/accounting/treatmentpackage'), 'active'=>isset($active['2.4']) ? true : false,),
                
                   
                //array('label'=>'Cabin', 'url'=>array('/inventory/product_cabin'), 'active'=>isset($active['1.2']) ? true : false,)
            )
        ),
   
   
array('label'=>'Report','icon' => 'icon-calendar', 'url'=>array('#'), 'active'=>isset($active['7']) ? true : false,
            'items'=> array(
                    array('label'=>'Product Price', 'url'=>array('/accounting/product/printoutproductprice'), 'active'=>isset($active['7.1']) ? true : false,),
                    array('label'=>'Treatment Price', 'url'=>array('/accounting/treatment/printouttreatmentprice'), 'active'=>isset($active['7.2']) ? true : false,),
                    array('label'=>'Product Package Price', 'url'=>array('/accounting/productpackage/printoutproductpackageprice'), 'active'=>isset($active['7.3']) ? true : false,),
                    array('label'=>'Treatment Package Price', 'url'=>array('/accounting/treatmentpackage/printouttreatmentpackageprice'), 'active'=>isset($active['7.4']) ? true : false,),
                    
           
   )),
    
   
);

?>
