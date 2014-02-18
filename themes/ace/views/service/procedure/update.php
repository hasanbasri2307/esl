<?php
$this->breadcrumbs=array(
	'Treatments'=>array('index'),
	$model->treatment_name=>array('view','id'=>$model->treatment_id),
	'Update',
);
$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.2'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>            Update Treatment #<?php echo $model->treatment_name; ?>
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