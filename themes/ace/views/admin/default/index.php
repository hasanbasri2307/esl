<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Dashboard'=>array('/admin'),
);
$this->menu=array(
		array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>true),
		array('label'=>'Employee','icon' => 'icon-user', 'url'=>array('/user/profiles'), 'active'=>false),
        array('label'=>'User','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>false),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>false),
        array('label'=>'Branch','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>false),
);
?>

<div class="page-header position-relative">
    <h1>            Dashboard
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           Welcome Admin

    </div>
</div>
 


