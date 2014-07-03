<?php
/* @var $this FaceProfileController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Face Profiles',
);
$this->renderPartial('../../menu',array(
			'active'=>array('10'=>true, '10.4'=>true),
		));
?>

<h1>Face Profiles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
