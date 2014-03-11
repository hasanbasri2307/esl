<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
	<?php echo $form->textFieldRow($model,'client_name'); ?>
        <?php echo $form->radioButtonListInlineRow($model, 'sex_id',
        CHtml::listData(Sex::model()->findAll(), 'sex_id', 'sex'),array('empty'=>'-')); ?>
        <?php echo $form->datepickerRow($model, 'dob', array('prepend'=>'<i class="icon-calendar"></i>')); ?>

	<?php echo $form->radioButtonListInlineRow($model, 'marital_status_id',
        CHtml::listData(MaritalStatus::model()->findAll(), 'marital_status_id', 'marital_status'),array('empty'=>'-')); ?>
	<?php echo $form->radioButtonListInlineRow($model, 'nationality_id',
        CHtml::listData(Nationality::model()->findAll(), 'nationality_id', 'nationality'),array('empty'=>'-')); ?>
       
	  <?php echo $form->select2Row(
                    $model,
                    'id_card_id',
                    array(
                        'data' => CHtml::listData(IdCard::model()->findAll(array()), 'id_card_id', 'id_card'),
                    )
                );
                
                ?>
                 <?php echo $form->textFieldRow($model,'id_card_id'); ?>
         <?php echo $form->textFieldRow($model,'id_card_number'); ?>
          <?php echo $form->textFieldRow($model,'address'); ?>
	  <?php echo $form->textFieldRow($model,'city'); ?>
	 <?php echo $form->textFieldRow($model,'zip_code'); ?>
        <?php echo $form->textFieldRow($model,'telephone'); ?>
        <?php echo $form->textFieldRow($model,'phone_kantor'); ?>
        <?php echo $form->textFieldRow($model,'hp1'); ?>
        <?php echo $form->textFieldRow($model,'hp2'); ?>
        <?php echo $form->textFieldRow($model,'email'); ?>
        
	 <?php echo $form->select2Row(
                    $model,
                    'source_info_id',
                    array(
                        'data' => CHtml::listData(SourceInfo::model()->findAll(array()), 'source_info_id', 'source_info'),
                    )
                );
                
                ?>
	
<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
        </div>
<?php $this->endWidget(); ?>
