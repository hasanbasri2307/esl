<?php
/* @var $this TreatmentController */
/* @var $data Treatment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('treatment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->treatment_id), array('view', 'id'=>$data->treatment_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('treatment_number')); ?>:</b>
	<?php echo CHtml::encode($data->treatment_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('treatment_name')); ?>:</b>
	<?php echo CHtml::encode($data->treatment_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('changed')); ?>:</b>
	<?php echo CHtml::encode($data->changed); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>