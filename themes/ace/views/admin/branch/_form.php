

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
	<?php echo $form->textFieldRow($model,'branch_number'); ?>
	<?php echo $form->textFieldRow($model,'branch_name',array('size'=>40,'maxlength'=>40)); ?>	
        <?php echo $form->textFieldRow($model,'address',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->textFieldRow($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->textFieldRow($model,'fax',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>5)); ?>
        <?php echo $form->timepickerRow($model, 'ot_start', array('hint'=>'', 'append'=>'<i class="icon-time" style="cursor:pointer"></i>', 'options'=>array('showMeridian'=>false)));?>
        <?php echo $form->timepickerRow($model, 'ot_end', array('hint'=>'', 'append'=>'<i class="icon-time" style="cursor:pointer"></i>', 'options'=>array('showMeridian'=>false)));?>
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
    </div>

<?php $this->endWidget(); ?>

