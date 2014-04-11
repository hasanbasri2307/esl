<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
        
        <?php echo $form->textFieldRow($model,'product_number',array('readonly'=>true)); ?>
        <?php echo $form->textFieldRow($model,'product_name',array('readonly'=>true)); ?>
	     
        <?php echo $form->textFieldRow($model,'price',array('prepend'=>'Rp. ','id'=>'price')); ?>
       
         
       

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
      