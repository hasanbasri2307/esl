<?php
/* @var $this TreatmentController */
/* @var $model Treatment */

$this->breadcrumbs=array(
	'Treatments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Treatment', 'url'=>array('index')),
	array('label'=>'Manage Treatment', 'url'=>array('admin')),
);
?>

<h1>Create Treatment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>