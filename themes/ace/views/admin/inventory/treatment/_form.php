<?php




?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
	<?php echo $form->textFieldRow($model,'treatment_number'); ?>
	<?php echo $form->textFieldRow($model,'treatment_name'); ?>
    <?php 
         $data = array(""=>"--Pilih--","ACT"=>"ACT","Dermaroller"=>"Dermaroller","Derma White"=>"Derma White","Dermalift"=>"Dermalift","Euroskinpeel"=>"Euroskinpeel","Facial Treatment"=>"Facial Treatment","Injection"=>"Injection","IPL (Intense Pulse Light) NannoLight USA"=>"IPL (Intense Pulse Light) NannoLight USA","Laser CO2"=>"Laser CO2","RF Tripolar"=>"RF Tripolar","Ultrasound"=>"Ultrasound");
         echo $form->select2Row(
                    $model,
                    'treatment_type',
                    array(
                        'data' => $data,
                    )
                );
        ?>
     <?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>5,)); ?>
        
        <?php echo $form->timepickerRow(
            $model,
            'duration',
            array(
               
                'class' => 'input-small',
                'readonly'=>true,
                'attribute' => 'hours',
                'append' => '<i class="icon-time"></i>',
                'options' => array(
                    'showMeridian' => false,
                     
                )
            )
        ); ?>
        
        
        
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
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
    </div>
<?php $this->endWidget(); ?>

     <?php
$path = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.scripts'));
Yii::app()->clientScript->registerScriptFile($path.'/jquery-number/jquery.number.min.js');

Yii::app()->clientScript->registerScript('form', "
$('#price').number(true, 2);
$('#Product_wholesale_price').number( true, 2 );
");
?>
	