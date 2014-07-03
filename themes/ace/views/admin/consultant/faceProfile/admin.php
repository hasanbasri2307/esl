<?php
/* @var $this FaceProfileController */
/* @var $model FaceProfile */

$this->breadcrumbs=array(
	'Face Profiles'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List FaceProfile', 'url'=>array('index')),
	array('label'=>'Create FaceProfile', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#face-profile-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Face Profiles</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'face-profile-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'faceprofile_id',
		'client_id',
		'problems',
		'skintexture_grade',
		'skintexture_level',
		'pigmentation_grade',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
