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
          
    array('label'=>'User','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>isset($active['3']) ? true : false,),
     array('label'=>'Room','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>isset($active['4']) ? true : false,
           
        ),
   
    array('label'=>'Branch','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>isset($active['5']) ? true : false,
           
        ),
    array('label'=>'Log Access','icon' => 'icon-flag', 'url'=>array('/admin/log'), 'active'=>isset($active['6']) ? true : false,
           
        ),

   
    
    array('label'=>'Pricing','icon' => 'icon-filter', 'url'=>array('/admin/accounting/product'), 'active'=>isset($active['8']) ? true : false,
            'items'=> array(
                array('label'=>'Product Price', 'url'=>array('/admin/accounting/product'), 'active'=>isset($active['8.1']) ? true : false,),
                 array('label'=>'Treatment Price', 'url'=>array('/admin/accounting/treatment'), 'active'=>isset($active['8.2']) ? true : false,),
                  array('label'=>'Product Package Price', 'url'=>array('/admin/accounting/productpackage'), 'active'=>isset($active['8.3']) ? true : false,),
				  array('label'=>'Treatment Package Price', 'url'=>array('/admin/accounting/treatmentpackage'), 'active'=>isset($active['8.4']) ? true : false,),
               
                //array('label'=>'Cabin', 'url'=>array('/inventory/product_cabin'), 'active'=>isset($active['1.2']) ? true : false,)
            )
        ),
	array('label'=>'Order','icon' => 'icon-dashboard', 'url'=>array('/admin/consultant'), 'active'=>isset($active['9']) ? true : false,
            'items'=> array(
                array('label'=>'Order List', 'url'=>array('/admin/consultant/order'), 'active'=>isset($active['9.1']) ? true : false,),
                array('label'=>'Create Order', 'url'=>array('/admin/consultant/order/create'), 'active'=>isset($active['9.2']) ? true : false,),
            )
        ),
    
    
    array('label'=>'Client','icon' => 'icon-user', 'url'=>array('/admin/consultant/client'), 'active'=>isset($active['10']) ? true : false,
            'items'=> array(
                array('label'=>'List Client', 'url'=>array('/admin/consultant/client'), 'active'=>isset($active['10.1']) ? true : false,),
                array('label'=>'Input', 'url'=>array('/admin/consultant/client/create'), 'active'=>isset($active['10.2']) ? true : false,),
                array('label'=>'Historycal', 'url'=>array('/admin/consultant/client/history'), 'active'=>isset($active['10.3']) ? true : false,),
                 array('label'=>'Face Profile', 'url'=>array('/admin/consultant/faceProfile/create'), 'active'=>isset($active['10.4']) ? true : false,),
            )
        ),
    
     array('label'=>'Room Schedule','icon' => 'icon-desktop', 'url'=>array('/admin/consultant/order'), 'active'=>isset($active['12']) ? true : false,
            'items'=> array(
               
                 array('label'=>'Reservation', 'url'=>array('/admin/consultant/schedule'), 'active'=>isset($active['12.1']) ? true : false,),
                  array('label'=>'Input', 'url'=>array('/admin/consultant/schedule/create'), 'active'=>isset($active['12.2']) ? true : false,),
                
            )
        ),
       array('label'=>'Product','icon' => 'icon-dashboard', 'url'=>array('/accounting/product'), 'active'=>isset($active['13']) ? true : false,
            'items'=> array(
               
                 array('label'=>'Supplier', 'url'=>array('/admin/inventory/supplier'), 'active'=>isset($active['13.2']) ? true : false,),
                  array('label'=>'Input Product', 'url'=>array('/admin/inventory/product/create'), 'active'=>isset($active['13.3']) ? true : false,),
                 array('label'=>'Master Product', 'url'=>array('/admin/inventory/product'), 'active'=>isset($active['13.4']) ? true : false,),
                 array('label'=>'Consume Product', 'url'=>array('/admin/inventory/product/consumeProduct'), 'active'=>isset($active['13.14']) ? true : false,),
                 array('label'=>'Master Stock Product', 'url'=>array('/admin/inventory/productStock'), 'active'=>isset($active['13.8']) ? true : false,),
                 array('label'=>'Consume Stock Product', 'url'=>array('/admin/inventory/productStock/consumeProductStock'), 'active'=>isset($active['13.15']) ? true : false,),
                 array('label'=>'Treatment', 'url'=>array('/admin/inventory/treatment'), 'active'=>isset($active['13.11']) ? true : false,),
                  array('label'=>'Master Machine', 'url'=>array('/admin/inventory/machine'), 'active'=>isset($active['13.12']) ? true : false,),
          array('label'=>'Machine on Branch', 'url'=>array('/admin/inventory/machinedetail'), 'active'=>isset($active['13.13']) ? true : false,),
                  array('label'=>'Product Package', 'url'=>array('/admin/inventory/productpackage'), 'active'=>isset($active['13.9']) ? true : false,),
                   array('label'=>'Treatment Package', 'url'=>array('/admin/inventory/treatmentpackage'), 'active'=>isset($active['13.10']) ? true : false,),
                
                  

                //array('label'=>'Cabin', 'url'=>array('/inventory/product_cabin'), 'active'=>isset($active['1.2']) ? true : false,)
            )
        ),

    
 
    //array('label'=>'Treatment Package','icon' => 'icon-home', 'url'=>array('/accounting/treatmentpackage'), 'active'=>false),

    array('label'=>'In/Out','icon' => 'icon-film', 'url'=>array('#'), 'active'=>isset($active['14']) ? true : false,
            'items'=> array(
                    array('label'=>'Incoming', 'url'=>array('/admin/inventory/incoming'), 'active'=>isset($active['14.1']) ? true : false,),
                    array('label'=>'Outgoing', 'url'=>array('/admin/inventory/outgoing'), 'active'=>isset($active['14.2']) ? true : false, ),
                    array('label'=>'Incoming From Supplier', 'url'=>array('/admin/inventory/incomingSupplier'), 'active'=>isset($active['14.3']) ? true : false, ),
            )
   ),
    

     array('label'=>'Report','icon' => 'icon-calendar', 'url'=>array('#'), 'active'=>isset($active['15']) ? true : false,
            'items'=> array(
                    array('label'=>'Master Stock', 'url'=>array('/admin/inventory/product/printoutmasterstockproduct'), 'active'=>isset($active['15.1']) ? true : false,),
                    array('label'=>'Consume Stock', 'url'=>array('/admin/inventory/product/printoutconsumestockproduct'), 'active'=>isset($active['15.2']) ? true : false, ),
                    array('label'=>'Incoming Product', 'url'=>array('/admin/inventory/incoming/printoutincoming'), 'active'=>isset($active['15.3']) ? true : false, ),
                    array('label'=>'Incoming Supplier Product', 'url'=>array('/admin/inventory/incomingsupplier/printoutincoming'), 'active'=>isset($active['15.4']) ? true : false, ),
                    array('label'=>'Outgoing Product', 'url'=>array('/admin/inventory/outgoing/printoutoutgoing'), 'active'=>isset($active['15.5']) ? true : false, ),
                    array('label'=>'Product Price', 'url'=>array('/admin/accounting/product/printoutproductprice'), 'active'=>isset($active['15.6']) ? true : false,),
                    array('label'=>'Treatment Price', 'url'=>array('/admin/accounting/treatment/printouttreatmentprice'), 'active'=>isset($active['15.7']) ? true : false,),
                    array('label'=>'Product Package Price', 'url'=>array('/admin/accounting/productpackage/printoutproductpackageprice'), 'active'=>isset($active['15.8']) ? true : false,),
                    array('label'=>'Treatment Package Price', 'url'=>array('/admin/accounting/treatmentpackage/printouttreatmentpackageprice'), 'active'=>isset($active['15.9']) ? true : false,),
                    array('label'=>'Reservation', 'url'=>array('/admin/consultant/schedule/printoutreservation'), 'active'=>isset($active['15.10']) ? true : false,),
                    array('label'=>'Order', 'url'=>array('/admin/consultant/order/printOrder'), 'active'=>isset($active['15.11']) ? true : false,),
   )),
   
    
   
);

?>
