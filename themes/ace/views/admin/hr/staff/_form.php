<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
	<?php echo $form->textFieldRow($model,'room_number'); ?>
	<?php echo $form->textFieldRow($model,'room_name'); ?>
       
        <?php echo $form->select2Row(
                    $model,
                    'treatment_id',
                    array(
                        'data' => CHtml::listData(Treatment::model()->findAll(), 'treatment_id', 'treatment_name'),
                    )
                );
                
                ?>
         <?php echo $form->select2Row(
                    $model,
                    'branch_id',
                    array(
                        'data' => CHtml::listData(Branch::model()->findAll(), 'branch_id', 'branch_name'),
                    )
                );
                
                ?>
        <?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>5)); ?>
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
    </div>

<?php $this->endWidget(); ?>


	