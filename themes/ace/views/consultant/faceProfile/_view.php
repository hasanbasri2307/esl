<?php
/* @var $this FaceProfileController */
/* @var $data FaceProfile */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('faceprofile_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->faceprofile_id), array('view', 'id'=>$data->faceprofile_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
	<?php echo CHtml::encode($data->client_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('problems')); ?>:</b>
	<?php echo CHtml::encode($data->problems); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skintexture_grade')); ?>:</b>
	<?php echo CHtml::encode($data->skintexture_grade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skintexture_level')); ?>:</b>
	<?php echo CHtml::encode($data->skintexture_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pigmentation_grade')); ?>:</b>
	<?php echo CHtml::encode($data->pigmentation_grade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pigmentation_level')); ?>:</b>
	<?php echo CHtml::encode($data->pigmentation_level); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('sebum_grade')); ?>:</b>
	<?php echo CHtml::encode($data->sebum_grade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sebum_level')); ?>:</b>
	<?php echo CHtml::encode($data->sebum_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skintone_grade')); ?>:</b>
	<?php echo CHtml::encode($data->skintone_grade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skintone_level')); ?>:</b>
	<?php echo CHtml::encode($data->skintone_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pores_grade')); ?>:</b>
	<?php echo CHtml::encode($data->pores_grade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pores_level')); ?>:</b>
	<?php echo CHtml::encode($data->pores_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eyewrinkles_grade')); ?>:</b>
	<?php echo CHtml::encode($data->eyewrinkles_grade); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('eyewrinkles_level')); ?>:</b>
	<?php echo CHtml::encode($data->eyewrinkles_level); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level_skin_type')); ?>:</b>
	<?php echo CHtml::encode($data->level_skin_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('level_skin_problem')); ?>:</b>
	<?php echo CHtml::encode($data->level_skin_problem); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	*/ ?>

</div>