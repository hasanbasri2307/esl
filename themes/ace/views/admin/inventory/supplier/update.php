<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Supplier'=>array('index'),
	$model->supplier_number=>array('view','id'=>$model->supplier_id),
	'Update',
);


$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.1'=>true),
		));
?>




<div class="page-header position-relative">
    <h1>            Update Supplier
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
      
           <?php echo $this->renderPartial('_form', array('model'=>$model,)); ?>

    </div>
</div>
 


