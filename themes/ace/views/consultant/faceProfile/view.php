<?php
/* @var $this FaceProfileController */
/* @var $model FaceProfile */

$this->breadcrumbs=array(
	'Face Profiles'=>array('index'),
	$model->faceprofile_id,
);

$this->menu=array(
	array('label'=>'List FaceProfile', 'url'=>array('index')),
	array('label'=>'Create FaceProfile', 'url'=>array('create')),
	array('label'=>'Update FaceProfile', 'url'=>array('update', 'id'=>$model->faceprofile_id)),
	array('label'=>'Delete FaceProfile', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->faceprofile_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FaceProfile', 'url'=>array('admin')),
);
?>

<h1>View FaceProfile #<?php echo $model->faceprofile_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'faceprofile_id',
		'client_id',
		'problems',
		'skintexture_grade',
		'skintexture_level',
		'pigmentation_grade',
		'pigmentation_level',
		'sebum_grade',
		'sebum_level',
		'skintone_grade',
		'skintone_level',
		'pores_grade',
		'pores_level',
		'eyewrinkles_grade',
		'eyewrinkles_level',
		'level_skin_type',
		'level_skin_problem',
		'user_id',
	),
)); ?>
