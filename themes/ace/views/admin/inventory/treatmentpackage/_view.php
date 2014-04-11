<?php
/* @var $this TreatmentpackageController */
/* @var $data Treatmentpackage */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('treatmentpackage_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->treatmentpackage_id), array('view', 'id'=>$data->treatmentpackage_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('treatmentpackage_number')); ?>:</b>
	<?php echo CHtml::encode($data->treatmentpackage_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('treatmentpackage_name')); ?>:</b>
	<?php echo CHtml::encode($data->treatmentpackage_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount_percent')); ?>:</b>
	<?php echo CHtml::encode($data->discount_percent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount_rp')); ?>:</b>
	<?php echo CHtml::encode($data->discount_rp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('created')); ?>:</b>
	<?php echo CHtml::encode($data->created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('changed')); ?>:</b>
	<?php echo CHtml::encode($data->changed); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	*/ ?>

</div>