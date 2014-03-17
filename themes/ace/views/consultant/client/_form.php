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
<?php echo $form->textFieldRow($model,'dop'); ?>
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
         <?php echo $form->textFieldRow($model,'id_card_number'); ?>
          <?php echo $form->textFieldRow($model,'client_number'); ?>
          <?php echo $form->textFieldRow($model,'address'); ?>
	  <?php echo $form->textFieldRow($model,'city'); ?>
	 <?php echo $form->textFieldRow($model,'zip_code'); ?>
        <?php echo $form->textFieldRow($model,'telephone'); ?>
         <?php echo $form->textFieldRow($model,'fax_number'); ?>
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
	 <?php echo $form->datepickerRow($model, 'date_join', array('prepend'=>'<i class="icon-calendar"></i>')); ?>
     <div class="control-group ">
            <label class="control-label required" for="Product_product_image">Image </label>
            <div class="controls">
                <div id="frame"> 
                <?php
                    
                         if(isset($model->pict)!="" )
                             echo "<img src=\"".Yii::app()->request->baseUrl."/upload/client/".$model->pict."\" />";
                    
                ?>
                </div>
                <span id="uploadedFile"> </span>
                <?php echo $form->hiddenField($model,'pict'); ?>
                  <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
                 array(
                       'id'=>'uploadFile',
                       'config'=>array(
                                       'action'=>Yii::app()->createUrl('/upload/clients'),
                                       'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                                       'sizeLimit'=>1*1024*1024,// maximum file size in bytes
                                       'minSizeLimit'=>10*1024,// minimum file size in bytes
                                        'multiple'=>false,
                                       'onComplete'=>"js:function(id, fileName, responseJSON){
                                        var filepath = 'upload/client/'+responseJSON['filename'];  
                                        jQuery('#frame').html('<img src=\"".Yii::app()->request->baseUrl."/'+filepath+'\" />');
                                        jQuery('#Product_image').val(filepath);    
                                        }",
                                       'messages'=>array(
                                                         'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                                         'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                                         'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                                         'emptyError'=>"{file} is empty, please select files again without it.",
                                                         'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                                                        ),
                                       'showMessage'=>"js:function(message){ alert(message); }"
                                      )
                                    ));
               ?>
            </div>
        </div>
<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
        </div>
<?php $this->endWidget(); ?>
