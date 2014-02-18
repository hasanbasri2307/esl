<?php
/* @var $this TreatmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Treatments',
);

$this->menu=array(
	array('label'=>'Create Treatment', 'url'=>array('create')),
	array('label'=>'Manage Treatment', 'url'=>array('admin')),
);
?>

<h1>Treatments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
