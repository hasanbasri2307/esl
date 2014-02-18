<?php
/* @var $this TreatmentController */
/* @var $model Treatment */

$this->breadcrumbs=array(
	'Treatments'=>array('index'),
	$model->treatment_id,
);

$this->menu=array(
	array('label'=>'List Treatment', 'url'=>array('index')),
	array('label'=>'Create Treatment', 'url'=>array('create')),
	array('label'=>'Update Treatment', 'url'=>array('update', 'id'=>$model->treatment_id)),
	array('label'=>'Delete Treatment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->treatment_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Treatment', 'url'=>array('admin')),
);
?>

<h1>View Treatment #<?php echo $model->treatment_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'treatment_id',
		'treatment_number',
		'treatment_name',
		'description',
		'user_id',
		'created',
		'changed',
		'active',
	),
)); ?>
