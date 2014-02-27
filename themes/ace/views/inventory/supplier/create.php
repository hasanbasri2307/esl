<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Supplier'=>array('/supplier/'),
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.2'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>            Create Supplier
            <small>
                    <i class="icon-double-angle-right">Supplier</i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
</div>
 
