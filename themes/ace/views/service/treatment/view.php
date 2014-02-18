<?php

$this->breadcrumbs=array(
	'Treatments'=>array('index'),
	$model->treatment_number,
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.1'=>true),
		));
?>

<h1>View Treatment #<?php echo $model->treatment_number; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	
		'treatment_number',
		'treatment_name',
		'description',
	),
)); ?>
 
 <?php
          $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Product',
                'url'=>array('treatment/product/id/'.$model->treatment_id),
        ));
          ?>
&nbsp;
<?php
           $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Procedure',
                'url'=>array('treatment/procedure/id/'.$model->treatment_id),
        ));
 
 ?>
&nbsp;
<?php
           $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Machine',
                'url'=>array('treatment/machine/id/'.$model->treatment_id),
        ));
 
 ?>
 
