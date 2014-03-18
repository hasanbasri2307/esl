<?php

$this->breadcrumbs=array(
	'Mesin'=>array('index'),
	$model->mesin_number,
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true,'1.12'=>true),
		));
?>

<h1>View Machine #<?php echo $model->mesin_number; ?></h1>

<?php 
$this->widget('bootstrap.widgets.TbButton', array(
                                'label'=>'Image',
                                'htmlOptions'=>array(
                                        'style'=>'margin-left:3px',
                                        'onclick'=>'js:bootbox.modal("<img src=\"'.Yii::app()->baseUrl."/upload/machine/".$model->image.'\"/>", "'.$model->mesin_name.'");'
                                ),
                          ));
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	
		'mesin_number',
		'mesin_name',
	
		'description',
	),
)); ?>
