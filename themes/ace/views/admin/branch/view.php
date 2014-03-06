<?php
/* @var $this BranchController */
/* @var $model Branch */

$this->breadcrumbs=array(
	'Branches'=>array('index'),
	$model->branch_number,
);

$this->menu=array(
	array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
	array('label'=>'Employee','icon' => 'icon-user', 'url'=>array('/user/profiles'), 'active'=>false),
        array('label'=>'User','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>false),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>false),
        array('label'=>'Branch Information','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>true),
);
?>

<h1>View Branch #<?php echo $model->branch_number; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'branch_number',
		'branch_name',
		'address',
		'phone',
		'fax',
		'ot_start',
		'ot_end',
		'user_id',
		'created',
		'changed',
		'active',
	),
)); ?>
