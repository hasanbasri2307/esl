<?php
/* @var $this FaceProfileController */
/* @var $model FaceProfile */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'faceprofile_id'); ?>
		<?php echo $form->textField($model,'faceprofile_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'client_id'); ?>
		<?php echo $form->textField($model,'client_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'problems'); ?>
		<?php echo $form->textArea($model,'problems',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skintexture_grade'); ?>
		<?php echo $form->textField($model,'skintexture_grade',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skintexture_level'); ?>
		<?php echo $form->textField($model,'skintexture_level',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pigmentation_grade'); ?>
		<?php echo $form->textField($model,'pigmentation_grade',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pigmentation_level'); ?>
		<?php echo $form->textField($model,'pigmentation_level',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sebum_grade'); ?>
		<?php echo $form->textField($model,'sebum_grade',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sebum_level'); ?>
		<?php echo $form->textField($model,'sebum_level',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skintone_grade'); ?>
		<?php echo $form->textField($model,'skintone_grade',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skintone_level'); ?>
		<?php echo $form->textField($model,'skintone_level',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pores_grade'); ?>
		<?php echo $form->textField($model,'pores_grade',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pores_level'); ?>
		<?php echo $form->textField($model,'pores_level',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eyewrinkles_grade'); ?>
		<?php echo $form->textField($model,'eyewrinkles_grade',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'eyewrinkles_level'); ?>
		<?php echo $form->textField($model,'eyewrinkles_level',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'level_skin_type'); ?>
		<?php echo $form->textField($model,'level_skin_type',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'level_skin_problem'); ?>
		<?php echo $form->textField($model,'level_skin_problem',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->