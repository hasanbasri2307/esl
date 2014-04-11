<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Treatment Package'=>array('index'),
	$model->treatmentpackage_id=>array('view','id'=>$model->treatmentpackage_id),
	'Update',
);


$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.9'=>true),
		));
?>




<div class="page-header position-relative">
    <h1>            Update Treatment Package
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_form', array('model'=>$model,'model_treatment'=>$model_treatment,)); ?>

    </div>
</div>
 


