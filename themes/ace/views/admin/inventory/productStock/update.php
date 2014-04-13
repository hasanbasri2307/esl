<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Stock Products'=>array('index'),
	$model->product->product_number=>array('view','id'=>$model->product->product_id),
	'Update',
);


$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.8'=>true),
		));
?>




<div class="page-header position-relative">
    <h1>            Update Stock Product
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
      
           <?php echo $this->renderPartial('_formStock', array('model'=>$model,)); ?>

    </div>
</div>
 


