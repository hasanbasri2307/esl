<?php

$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->room_number,
);

$this->renderPartial('../menu',array(
            'active'=>array('6'=>true),
        ));
?>

<h1>View Room #<?php echo $model->room_number; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'branch.branch_name',
		'room_number',
		'room_name',
		'treatment.treatment_name',
		'description',
	),
)); ?>
