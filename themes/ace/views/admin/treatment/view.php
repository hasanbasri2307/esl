<?php

$this->breadcrumbs=array(
	'Treatments'=>array('index'),
	$model->treatment_number,
);

$this->menu=array(
	array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
        array('label'=>'Staffs','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>false),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>false),
         array('label'=>'Treatment','icon' => 'icon-home', 'url'=>array('/admin/treatment'), 'active'=>true),
        array('label'=>'Branch Information','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>false),
);
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
