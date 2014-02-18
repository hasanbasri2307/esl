<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
       <?php echo $form->radioButtonListInlineRow($model, 'io', array(
		'1'=>'Incoming',
		'2'=>'Outgoing',
	)); ?>
              <div class="control-group ">
            <label class="control-label required" for="product_number">Product Number <span class="required">*</span></label>
            <div class="controls">
               
                 <?php echo $form->hiddenField($model,'product_id'); ?>
        <?php 
        
        
        $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Product_number',
                        'source'=>$this->createUrl('/accounting/product/autocomplete_number'),
                        'value' => $model->product->product_number,
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Product_number").val( ui.item.label);
                                jQuery("#Product_name").val( ui.item.value2);
                                 jQuery("#Io_product_id").val(ui.item.value); 
                                return false;
                            }',
                            'select'=>'js:function( event, ui ) {
                                return false;
                            }'
                        ),
                        'htmlOptions'=>array( 'autocomplete'=>'off'),
                    )); ?>

            </div>
        </div>
        
            <div class="control-group ">
            <label class="control-label required" for="product_name">Product Name <span class="required">*</span></label>
            <div class="controls">
  
       <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Product_name',
                        'source'=>$this->createUrl('/accounting/product/autocomplete_name'),
                        'value' => $model->product->product_name,
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Product_number").val( ui.item.value2);
                                jQuery("#Product_name").val( ui.item.label);
                                 jQuery("#Io_product_id").val(ui.item.value); 
                                return false;
                            }',
                            'select'=>'js:function( event, ui ) {
                                return false;
                            }'
                        ),
                        'htmlOptions'=>array( 'autocomplete'=>'off'),
                    )); ?>

            </div>
        </div>
         <?php echo $form->select2Row(
                    $model,
                    'branch_id',
                    array(
                        'data' => CHtml::listData(Branch::model()->findAll(), 'branch_id', 'branch_name'),
                    )
                );
                
                ?>
   
        <?php echo $form->textAreaRow($model, 'description', array('class'=>'span4', 'rows'=>5)); ?>
        <?php echo $form->textFieldRow($model,'quantity'); ?>
       
        <?php echo $form->datepickerRow($model, 'date', array('prepend'=>'<i class="icon-calendar"></i>')); ?>
        <?php echo $form->textFieldRow($model, 'delivery_note'); ?>
        <?php echo $form->textFieldRow($model,'quantity_deliver'); ?>
        <?php echo $form->datepickerRow($model, 'date_deliver', array('prepend'=>'<i class="icon-calendar"></i>')); ?>
	<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
        </div>
<?php $this->endWidget(); ?>
