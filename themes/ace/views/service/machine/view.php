<?php

$this->breadcrumbs=array(
	'Machine'=>array('index'),
	$model->machine_number,
);

$this->renderPartial('../menu',array(
			'active'=>array('2'=>true),
		));
?>

<h1>View Treatment #<?php echo $model->machine_number; ?></h1>

<?php 
$this->widget('bootstrap.widgets.TbButton', array(
                                'label'=>'Image',
                                'htmlOptions'=>array(
                                        'style'=>'margin-left:3px',
                                        'onclick'=>'js:bootbox.modal("<img src=\"'.Yii::app()->baseUrl."/".$model->image.'\"/>", "'.$model->machine_name.'");'
                                ),
                          ));
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	
		'machine_number',
		'machine_name',
	
		'description',
	),
)); ?>
