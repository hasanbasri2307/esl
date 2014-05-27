<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>
    <h4>Personal Information</h4>
    <br>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
	<?php echo $form->textFieldRow($model,'client_name'); ?>
     
        <?php echo $form->datepickerRow($model, 'dob', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

          <?php echo $form->textAreaRow($model, 'address', array('class'=>'span8', 'rows'=>5)); ?>
	
        <?php echo $form->textFieldRow($model,'telephone'); ?>
        <?php echo $form->textFieldRow($model,'hp1'); ?>


<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
        </div>
<?php $this->endWidget(); ?>
