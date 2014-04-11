<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->promo_number=>array('view','id'=>$model->promo_id),
	'Update',
);


$this->renderPartial('../menu',array(
			'active'=>array('2'=>true, '2.1'=>true),
		));
?>




<div class="page-header position-relative">
    <h1>            Update Promo
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
      
           <?php echo $this->renderPartial('_form', array('model'=>$model,'model_product'=>$model_product)); ?>

    </div>
</div>
 


