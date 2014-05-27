
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
                'htmlOptions' => array('enctype'=>'multipart/form-data'),
	)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model)); ?>

	 
		
        <?php echo $form->textFieldRow($model,'name',array('size'=>60,'maxlength'=>128)); ?>
        <?php echo $form->textFieldRow($model,'nik',array('size'=>60,'maxlength'=>30)); ?>
        <?php echo $form->datepickerRow(
        $model,
        'dob',
        array(
        'prepend' => '<i class="icon-calendar"></i>'
        )
    ); ?>

                 <?php echo $form->select2Row(
                    $model,
                    'branch_id',
                    array(
                        'data' => CHtml::listData(Branch::model()->findAll(), 'branch_id', 'branch_name'),
                    )
                );
				
				echo $form->select2Row(
                    $model,
                    'id_divisi',
                    array(
                        'data' => CHtml::listData(Divisi::model()->findAll(), 'id_divisi', 'nama_divisi'),
                    )
                );
				echo $form->select2Row(
                    $model,
                    'id_level_jabatan',
                    array(
                        'data' => CHtml::listData(LevelJabatan::model()->findAll(), 'id_level_jabatan', 'level_jabatan'),
                    )
                );
				
				echo $form->select2Row(
                    $model,
                    'id_jabatan',
                    array(
                        'data' => CHtml::listData(Jabatan::model()->findAll(), 'id_jabatan', 'nama_jabatan'),
                    )
                );
				
                
				?>
				
 <?php echo $form->textAreaRow($model, 'address', array('class'=>'span8', 'rows'=>5)); ?>
 <?php echo $form->textFieldRow($model, 'phone'); ?>
 <?php echo $form->textFieldRow($model,'npwp'); ?>
 <?php echo $form->textAreaRow($model, 'education_background', array('class'=>'span8', 'rows'=>5)); ?>
 <?php echo $form->textFieldRow($model,'working_location'); ?>
 <?php echo $form->textFieldRow($model,'npwp'); ?>
 <?php echo $form->textFieldRow($model,'marital_status'); ?>
 <?php echo $form->select2Row(
                    $model,
                    'religion',
                    array(
                        'data' => array('Hindu'=>'Hindu','Budha'=>'Budha','Katolik'=>'Katolik','Protestan'=>'Protestan','Islam'=>'Islam','Lain-lain'=>'Lain-lain'),
                    )
                );
                
                ?>
  <?php echo $form->textFieldRow($model,'bank_name'); ?> 
  <?php echo $form->textFieldRow($model,'bank_account'); ?>  
   <?php echo $form->radioButtonListInlineRow($model, 'employee_status',
        array('Permanent'=>'Permanent', 'Contract' =>'Contract','Probation'=>'Probation'),array('empty'=>'-')); ?>    
 <?php echo $form->datepickerRow(
        $model,
        'contract_start',
        array(
        'prepend' => '<i class="icon-calendar"></i>'
        )
    ); ?>   

<?php echo $form->datepickerRow(
        $model,
        'contract_jatuh_tempo',
        array(
        'prepend' => '<i class="icon-calendar"></i>'
        )
    ); ?> 
    <?php echo $form->select2Row(
                    $model,
                    'id_type',
                    array(
                        'data' => array('KTP'=>'KTP','SIM'=>'SIM'),
                    )
                );
                
                ?>
                <?php echo $form->textFieldRow($model,'id_number'); ?>
<?php echo $form->textAreaRow($model, 'remarks', array('class'=>'span8', 'rows'=>5)); ?>
      <div class="control-group ">
            <label class="control-label required" for="Product_product_image">Foto </label>
            <div class="controls">
                <div id="frame"> 
                <?php
                    
                         if(isset($model->foto)!="" )
                             echo "<img src=\"".Yii::app()->request->baseUrl."/".$model->foto."\" />";
                    
                ?>
                </div>
                <span id="uploadedFile"> </span>
                <?php echo $form->hiddenField($model,'foto'); ?>
                  <?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
                 array(
                       'id'=>'uploadFile',
                       'config'=>array(
                                       'action'=>Yii::app()->createUrl('/upload/index'),
                                       'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
                                       'sizeLimit'=>1*1024*1024,// maximum file size in bytes
                                       'minSizeLimit'=>10*1024,// minimum file size in bytes
                                        'multiple'=>false,
                                       'onComplete'=>"js:function(id, fileName, responseJSON){
                                        var filepath = 'upload/'+responseJSON['filename'];  
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

