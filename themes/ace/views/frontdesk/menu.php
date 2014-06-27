<?php

$criteria=new CDbCriteria();
        $branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');

        
             $criteria->condition = "branch_id=$branch_id AND status=0  ";
        $count=Client::model()->count($criteria);
$this->menu=array(
  
    array('label'=>'Scan Client No','icon' => 'icon-dashboard', 'url'=>array('/frontdesk'), 'active'=>isset($active['1']) ? true : false,),
     array('label'=>'Client','icon' => 'icon-user', 'url'=>array('/frontdesk/client'), 'active'=>isset($active['2']) ? true : false,
            'items'=> array(
                array('label'=>'List Client', 'url'=>array('/frontdesk/client'), 'active'=>isset($active['2.1']) ? true : false,),
                 array('label'=>'New Client ('. $count.')', 'url'=>array('/frontdesk/client/clientnew'), 'active'=>isset($active['2.2']) ? true : false,),
               
               
            )
        ),

    
    array('label'=>'Room Schedule','icon' => 'icon-home', 'url'=>array('/frontdesk/schedule'), 'active'=>isset($active['3']) ? true : false,
            'items'=> array(
               
                 array('label'=>'Reservation', 'url'=>array('/frontdesk/schedule'), 'active'=>isset($active['3.2']) ? true : false,),
                  array('label'=>'Input', 'url'=>array('/frontdesk/schedule/create'), 'active'=>isset($active['3.3']) ? true : false,),
                 
                 
                //array('label'=>'Cabin', 'url'=>array('/inventory/product_cabin'), 'active'=>isset($active['1.2']) ? true : false,)
            )
        ),
    array('label'=>'Report','icon' => 'icon-calendar', 'url'=>array('#'), 'active'=>isset($active['4']) ? true : false,
            'items'=> array(
                    array('label'=>'Reservation', 'url'=>array('/frontdesk/schedule/printoutreservation'), 'active'=>isset($active['4.1']) ? true : false,),
                    
           
   )),
    /*
    array('label'=>'Product Information','icon' => 'icon-flag', 'url'=>array('/frontdesk/product'), 'active'=>isset($active['4']) ? true : false,),
   */
);

?>