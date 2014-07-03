<?php
$criteria=new CDbCriteria();
        $branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');

        
             $criteria->condition = "branch_id=$branch_id AND status=0  ";
        $count=Client::model()->count($criteria);

$this->menu=array(
  array('label'=>'Dashboard','icon' => 'icon-adjust', 'url'=>array('/consultant'), 'active'=>isset($active['6']) ? true : false,),
    array('label'=>'Order','icon' => 'icon-dashboard', 'url'=>array('/consultant'), 'active'=>isset($active['1']) ? true : false,
            'items'=> array(
                array('label'=>'Order List', 'url'=>array('/consultant/order'), 'active'=>isset($active['1.1']) ? true : false,),
                array('label'=>'Create Order', 'url'=>array('/consultant/order/create'), 'active'=>isset($active['1.2']) ? true : false,),
            )
        ),
    
    
    array('label'=>'Client','icon' => 'icon-user', 'url'=>array('/consultant/client'), 'active'=>isset($active['2']) ? true : false,
            'items'=> array(
                array('label'=>'List Client', 'url'=>array('/consultant/client'), 'active'=>isset($active['2.1']) ? true : false,),
                 array('label'=>'New Client ('. $count.')', 'url'=>array('/consultant/client/clientnew'), 'active'=>isset($active['2.4']) ? true : false,),
                array('label'=>'Input', 'url'=>array('/consultant/client/create'), 'active'=>isset($active['2.2']) ? true : false,),
                array('label'=>'Historycal', 'url'=>array('/consultant/client/history'), 'active'=>isset($active['2.3']) ? true : false,),
               array('label'=>'Face Profile', 'url'=>array('/consultant/faceProfile/create'), 'active'=>isset($active['2.5']) ? true : false,),
            )
        ),
    
     array('label'=>'Room Schedule','icon' => 'icon-desktop', 'url'=>array('/consultant/order'), 'active'=>isset($active['4']) ? true : false,
            'items'=> array(
               
                 array('label'=>'Reservation', 'url'=>array('/consultant/schedule'), 'active'=>isset($active['4.2']) ? true : false,),
                 
                
            )
        ),
   
    
     array('label'=>'Report','icon' => 'icon-calendar', 'url'=>array('#'), 'active'=>isset($active['7']) ? true : false,
            'items'=> array(
                    array('label'=>'Reservation', 'url'=>array('/consultant/schedule/printoutreservation'), 'active'=>isset($active['7.1']) ? true : false,),
                    array('label'=>'Order', 'url'=>array('/consultant/order/printOrder'), 'active'=>isset($active['7.2']) ? true : false,),
                    
           
   )),

   
);

?>
