<?php

$this->menu=array(
  
    array('label'=>'Scan Client No','icon' => 'icon-dashboard', 'url'=>array('/frontdesk'), 'active'=>isset($active['1']) ? true : false,),
    array('label'=>'Client Information','icon' => 'icon-user', 'url'=>array('/frontdesk/client'), 'active'=>isset($active['2']) ? true : false,),
    array('label'=>'Room Schedule','icon' => 'icon-home', 'url'=>array('/frontdesk/schedule'), 'active'=>isset($active['3']) ? true : false,),
    array('label'=>'Product Information','icon' => 'icon-flag', 'url'=>array('/frontdesk/product'), 'active'=>isset($active['4']) ? true : false,),
   
);

?>