<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Product Package'=>array('index'),
	$model->productpackage_id=>array('view','id'=>$model->productpackage_id),
	'Update',
);


$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.8'=>true),
		));
?>




<div class="page-header position-relative">
    <h1>            Update Product Package
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
 


