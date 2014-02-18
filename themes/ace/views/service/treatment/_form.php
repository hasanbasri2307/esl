<?php


echo strtotime($_POST['Treatment']['duration']);

?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
	<?php echo $form->textFieldRow($model,'treatment_number'); ?>
	<?php echo $form->textFieldRow($model,'treatment_name'); ?>

        <?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>5)); ?>
        
        <?php echo $form->timepickerRow(
            $model,
            'duration',
            array(
               
                'class' => 'input-small',
                'attribute' => 'hours',
                'append' => '<i class="icon-time"></i>',
                'options' => array(
                    'showMeridian' => false,
                     
                )
            )
        ); ?>
        <?php echo $form->textFieldRow($model,'price',array('prepend'=>'Rp. ')); ?>
        <?php echo $form->textFieldRow($model,'point'); ?>
        <!--
        <h4>WHITENING</h4>
        <?php echo $form->checkBoxListInlineRow($model, 'protocol', array('Cleanser', 'Toner', 'Day Cream', 'Night Cream')); ?>
        <?php echo $form->checkBoxListInlineRow($model, 'exfoliate', array('Regular Facial', 'Microdermabration', 'Euroskinpee')); ?>
        <?php echo $form->checkBoxListInlineRow($model, 'repair', array(' ')); ?>
        <?php echo $form->checkBoxListInlineRow($model, 'maintain', array(' ')); ?>
       
      
        <h4>ACNE</h4>
        <?php echo $form->checkBoxListInlineRow($model, 'protocol', array('Cleanser', 'Toner', 'Day Cream', 'Night Cream')); ?>
        <?php echo $form->checkBoxListInlineRow($model, 'exfoliate', array('Regular Facial', 'Microdermabration', 'Euroskinpee')); ?>
        <?php echo $form->checkBoxListInlineRow($model, 'repair', array(' ')); ?>
        <?php echo $form->checkBoxListInlineRow($model, 'maintain', array(' ')); ?>
     
     
             <h4>WRINKLE</h4>
        <?php echo $form->checkBoxListInlineRow($model, 'protocol', array('Cleanser', 'Toner', 'Day Cream', 'Night Cream')); ?>
        <?php echo $form->checkBoxListInlineRow($model, 'exfoliate', array('Regular Facial', 'Microdermabration', 'Euroskinpee')); ?>
        <?php echo $form->checkBoxListInlineRow($model, 'repair', array(' ')); ?>
        <?php echo $form->checkBoxListInlineRow($model, 'maintain', array(' ')); ?>
               -->
        <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
    </div>
<?php $this->endWidget(); ?>


	