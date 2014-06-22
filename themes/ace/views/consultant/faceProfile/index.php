<?php
/* @var $this FaceProfileController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Face Profiles',
);

$this->menu=array(
	array('label'=>'Create FaceProfile', 'url'=>array('create')),
	array('label'=>'Manage FaceProfile', 'url'=>array('admin')),
);
?>

<h1>Face Profiles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
