
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
                'htmlOptions' => array('enctype'=>'multipart/form-data'),
	)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

	 
		<?php echo $form->textFieldRow($model,'username'); ?>
		<?php echo $form->passwordFieldRow($model,'password',array('size'=>60,'maxlength'=>128)); ?>
                <?php echo $form->textFieldRow($model,'email',array('size'=>60,'maxlength'=>128)); ?>
                <?php echo $form->textFieldRow($profile,'name',array('size'=>60,'maxlength'=>128)); ?>
         <?php echo $form->datepickerRow($profile, 'dob',
        array(
        'prepend'=>'<i class="icon-calendar"></i>')); ?>
                 <?php echo $form->select2Row(
                    $profile,
                    'branch_id',
                    array(
                        'data' => CHtml::listData(Branch::model()->findAll(), 'branch_id', 'branch_name'),
                    )
                );
                  echo $form->select2Row(
                    $auth_assignment,
                    'itemname',
                    array(
                        'data' => CHtml::listData(Right::model()->findAll(), 'itemname', 'itemname'),
                    )
                );
                
            
                ?>
 <?php echo $form->textAreaRow($profile, 'address', array('class'=>'span8', 'rows'=>5)); ?>
 <?php echo $form->textFieldRow($profile, 'phone'); ?>

<?php echo $form->dropDownListRow($model, 'status',
        array('1'=>'Active', '0'=>'Not active')); ?>
      
 <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
    </div>

<?php $this->endWidget(); ?>

