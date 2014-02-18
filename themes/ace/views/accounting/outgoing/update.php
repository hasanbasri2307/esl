<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Outgoing'=>array('index'),
	$model->io_id=>array('view','id'=>$model->io_id),
	'Update',
);


$this->renderPartial('../menu',array(
			'active'=>array('3'=>true, '3.2'=>true),
		));
?>




<div class="page-header position-relative">
    <h1>            Update Product
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_form', array('model'=>$model,'model_product'=>$model_product,)); ?>

    </div>
</div>
 


