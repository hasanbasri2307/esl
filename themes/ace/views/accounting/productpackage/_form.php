<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
   
   		<?php echo $form->textFieldRow($model,'productpackage_name',array('readonly'=>'readonly')); ?>
        <?php echo $form->textFieldRow($model,'price',array('prepend'=>'Rp. ','id'=>'price')); ?>
        <?php echo $form->textFieldRow($model,'discount_percent',array('prepend'=>'% ')); ?>
        <?php echo $form->textFieldRow($model,'discount_rp',array('prepend'=>'Rp. ','id'=>'discount_rp')); ?>
		
        <?php echo $form->textAreaRow($model, 'description', array('class'=>'span4', 'rows'=>5,'readonly'=>'readonly')); ?>
      
       
        
        
   
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
$('#discount_rp').number(true, 2);
$('#Product_wholesale_price').number( true, 2 );
");
?>

