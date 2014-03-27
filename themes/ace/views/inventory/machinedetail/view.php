<?php

$this->breadcrumbs=array(
	'Machine on Branch'=>array('index'),
	$model->mesin_detail_id,
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true,'1.13'=>true),
		));
?>

<h1>View Machine Detail #<?php echo $model->mesin_detail_id; ?> (<?php echo $model->branch->branch_name;?>)</h1>

<?php 

$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	
		'machine.mesin_number',
		'machine.mesin_name',
		'branch.branch_name',
		'date_purchase',
	),
)); ?>
