<?php
/* @var $this BranchController */
/* @var $model Branch */

$this->breadcrumbs=array(
	'Branches'=>array('index'),
	$model->branch_number,
);

$this->renderPartial('../menu',array(
            'active'=>array('5'=>true),
        ));
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
