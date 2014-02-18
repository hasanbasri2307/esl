<?php
/* @var $this TreatmentController */
/* @var $model Treatment */

$this->breadcrumbs=array(
	'Treatments'=>array('index'),
	$model->treatment_id=>array('view','id'=>$model->treatment_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Treatment', 'url'=>array('index')),
	array('label'=>'Create Treatment', 'url'=>array('create')),
	array('label'=>'View Treatment', 'url'=>array('view', 'id'=>$model->treatment_id)),
	array('label'=>'Manage Treatment', 'url'=>array('admin')),
);
?>

<h1>Update Treatment <?php echo $model->treatment_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>