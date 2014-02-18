<?php

$this->menu=array(
   array('label'=>'Treatment','icon' => 'icon-dashboard', 'url'=>array('/service/treatment'), 'active'=>isset($active['1']) ? true : false,
            
        ),
    array('label'=>'Machine','icon' => 'icon-dashboard', 'url'=>array('/service/machine'), 'active'=>isset($active['2']) ? true : false,
            
        ),
 
);

?>