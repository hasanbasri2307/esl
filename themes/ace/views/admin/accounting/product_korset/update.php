<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products Korset'=>array('index'),
	$model->product_number=>array('view','id'=>$model->product_id),
	'Update',
);


$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.3'=>true),
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
      
           <?php echo $this->renderPartial('_form', array('model'=>$model,'model_detail'=>$model_detail)); ?>

    </div>
</div>
 


