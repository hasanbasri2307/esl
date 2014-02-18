<?php

$this->breadcrumbs=array(
	'Treatments'=>array('index'),
	$model->treatment_number,
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.2'=>true),
		));
?>

<h1>View Treatment #<?php echo $model->treatment_number; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	
		'treatment_number',
		'treatment_name',
	
		'description',
	),
)); ?>
