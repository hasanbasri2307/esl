<?php
/* @var $this ProductStockController */
/* @var $data ProductStock */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('product__stock_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->product__stock_id), array('view', 'id'=>$data->product__stock_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('branch_id')); ?>:</b>
	<?php echo CHtml::encode($data->branch_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('changed')); ?>:</b>
	<?php echo CHtml::encode($data->changed); ?>
	<br />


</div>