<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
                
	)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
	<?php echo $form->select2Row(
                    $model,
                    'branch_id',
                    array(
                        'data' => CHtml::listData(Branch::model()->findAll(array()), 'branch_id', 'branch_name'),
                    )
                );
                
                ?>
    <?php echo $form->select2Row(
                    $model,
                    'mesin_id',
                    array(
                        'data' => CHtml::listData(Mesin::model()->findAll(array()), 'mesin_id', 'mesin_name'),
                    )
                );
                
                ?>
	 <?php echo $form->datepickerRow($model, 'date_purchase', array('prepend'=>'<i class="icon-calendar"></i>')); ?>
  <?php echo $form->textFieldRow($model,'date_maintenance'); ?>

        
        <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
    </div>

<?php $this->endWidget(); ?>


	