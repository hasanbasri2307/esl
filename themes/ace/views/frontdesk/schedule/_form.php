         <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
		
	)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
	<div class="control-group">
		<label class="control-label" for="form-field-1">Client Name</label>

		<div class="controls">
			<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'client_name',
                        'source'=>$this->createUrl('/frontdesk/schedule/autocomplete_name'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#client_id").val( ui.item.label);
                                 
                                return false;
                            }',
                            'select'=>'js:function( event, ui ) {
                                return false;
                            }'
                        ),
                        'htmlOptions'=>array( 'autocomplete'=>'off','id'=>'client_id'),
                    )); ?>
		</div>
	</div>
    
	<?php echo $form->datepickerRow(
		$model,
		'date_t',
		array(
		'prepend' => '<i class="icon-calendar"></i>'
		)
    ); ?>
    <?php echo $form->timepickerRow(
		$model,
		'time_t',
		array(
		'noAppend' => false,
		'class' => 'input-small',
		'options' => array(
			'showMeridian' => false
			)
		)
	); ?>
    <?php echo $form->timepickerRow(
		$model,
		'duration',
		array(
		'noAppend' => false,
		'class' => 'input-small',
		'options' => array(
			'showMeridian' => false
			)
		)
	); ?>


	
       <div class="control-group ">


         <?php echo $form->dropDownListRow(
                    $model,
                    'room_id',
                    array(
                        'Pilih' => CHtml::listData(Room::model()->findAll(array(
        'condition'=>'branch_id=:branch', 
        'params'=>array(':branch'=>Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id'))
    )), 'room_id', 'room_name'),
                    )
                );
				
                
                ?>
       
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
    </div>

<?php $this->endWidget(); ?>

     