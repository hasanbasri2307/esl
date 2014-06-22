<?php
/* @var $this FaceProfileController */
/* @var $model FaceProfile */

$this->breadcrumbs=array(
	'Face Profiles'=>array('index'),
	$model->faceprofile_id=>array('view','id'=>$model->faceprofile_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FaceProfile', 'url'=>array('index')),
	array('label'=>'Create FaceProfile', 'url'=>array('create')),
	array('label'=>'View FaceProfile', 'url'=>array('view', 'id'=>$model->faceprofile_id)),
	array('label'=>'Manage FaceProfile', 'url'=>array('admin')),
);
?>

<h1>Update FaceProfile <?php echo $model->faceprofile_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>