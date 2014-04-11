<?php
/* @var $this TreatmentpackageController */
/* @var $model Treatmentpackage */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'treatmentpackage_id'); ?>
		<?php echo $form->textField($model,'treatmentpackage_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'treatmentpackage_number'); ?>
		<?php echo $form->textField($model,'treatmentpackage_number',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'treatmentpackage_name'); ?>
		<?php echo $form->textField($model,'treatmentpackage_name',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount_percent'); ?>
		<?php echo $form->textField($model,'discount_percent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'discount_rp'); ?>
		<?php echo $form->textField($model,'discount_rp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created'); ?>
		<?php echo $form->textField($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'changed'); ?>
		<?php echo $form->textField($model,'changed'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->