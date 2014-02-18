<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Client',
);
$this->menu=array(
    array('label'=>'Order Lists','icon' => 'icon-dashboard', 'url'=>array('/consultant/order'), 'active'=>false),
    array('label'=>'Client','icon' => 'icon-user', 'url'=>array('/consultant/client'), 'active'=>true),
    array('label'=>'Treatment Rec','icon' => 'icon-home', 'url'=>array('/consultant/treatmentrec'), 'active'=>false),
    array('label'=>'Report','icon' => 'icon-flag', 'url'=>array('/consultant/report'), 'active'=>false),
   
);
?>
<div class="page-header position-relative">
    <h1>            Create Client
            <small>
                    <i class="icon-double-angle-right"> </i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
</div>
 