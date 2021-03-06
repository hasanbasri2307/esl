<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
	<?php echo $form->textFieldRow($model,'supplier_name'); ?>
        <?php echo $form->textAreaRow($model, 'address', array('class'=>'span8', 'rows'=>5)); ?>
        <?php echo $form->textFieldRow($model,'phone'); ?>
        <?php echo $form->textFieldRow($model,'fax'); ?>
        <?php echo $form->textFieldRow($model,'hp'); ?>
        <?php echo $form->textFieldRow($model,'contact_person'); ?>
        <?php echo $form->textFieldRow($model,'Jabatan'); ?>
        <?php echo $form->textFieldRow($model,'Email'); ?>
        <?php echo $form->textFieldRow($model,'npwp'); ?>
        <?php echo $form->textFieldRow($model,'nama_bank'); ?>
        <?php echo $form->textFieldRow($model,'no_rekening'); ?>
        <?php echo $form->radioButtonListInlineRow(
$model,
'kategori',
array(
'Obat',
'Mesin',
'Alat',
)
); ?>
<?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>5)); ?>
	
<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
        </div>
<?php $this->endWidget(); ?>
