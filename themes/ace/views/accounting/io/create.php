<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

$this->menu=array(
    array('label'=>'Master Product','icon' => 'icon-dashboard', 'url'=>array('/accounting/product'), 'active'=>false),
    array('label'=>'Product Set','icon' => 'icon-user', 'url'=>array('/accounting/productset'), 'active'=>false),
    array('label'=>'Treatment Package','icon' => 'icon-home', 'url'=>array('/accounting/treatmentpackage'), 'active'=>false),
    array('label'=>'Incoming/Outgoing','icon' => 'icon-flag', 'url'=>array('/accounting/io'), 'active'=>true),
    array('label'=>'Voucher','icon' => 'icon-flag', 'url'=>array('/accounting/voucher'), 'active'=>false),
);
?>




<div class="page-header position-relative">
    <h1>            Create Product
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
</div>
 


