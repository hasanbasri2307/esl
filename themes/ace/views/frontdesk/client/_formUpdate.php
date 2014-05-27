<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'horizontalForm',
        'type'=>'horizontal',
    )); ?>

     

    <h4>Personal Information</h4>
    <br>
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
     <div class="control-group">
       <label class="control-label" for="form-field-1">Client Name</label>

            <div class="controls">
                <input type="text" id="form-field-1" name="first_name" value="<?php echo $model['client_name'];?>" />
             </div>
     </div> 


    
    <?php echo $form->radioButtonListInlineRow(
$model,
'title',
array(
'Mr.',
'Mrs.',
'Ms.',
)
); ?>
        <?php echo $form->radioButtonListInlineRow($model, 'sex_id',
        CHtml::listData(Sex::model()->findAll(), 'sex_id', 'sex'),array('empty'=>'-')); ?>
        <?php echo $form->datepickerRow($model, 'dob', array('prepend'=>'<i class="icon-calendar"></i>')); ?>
<?php echo $form->textFieldRow($model,'dop'); ?>
    <?php echo $form->radioButtonListInlineRow($model, 'marital_status_id',
        CHtml::listData(MaritalStatus::model()->findAll(), 'marital_status_id', 'marital_status'),array('empty'=>'-')); ?>
        <?php echo $form->select2Row(
                    $model,
                    'agama',
                    array(
                        'data' => array('Hindu'=>'Hindu','Budha'=>'Budha','Katolik'=>'Katolik','Protestan'=>'Protestan','Islam'=>'Islam','Lain-lain'=>'Lain-lain'),
                    )
                );
                
                ?>
                 <?php echo $form->textFieldRow($model,'pekerjaan'); ?>
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
          <?php echo $form->textFieldRow($model,'client_number',array('readonly' =>'readonly')); ?>
          <?php echo $form->textAreaRow($model, 'address', array('class'=>'span8', 'rows'=>5)); ?>
      <?php echo $form->textFieldRow($model,'city'); ?>
     <?php echo $form->textFieldRow($model,'zip_code'); ?>
        <?php echo $form->textFieldRow($model,'telephone'); ?>
         <?php echo $form->textFieldRow($model,'fax_number'); ?>
        <?php echo $form->textFieldRow($model,'phone_kantor'); ?>
        <?php echo $form->textFieldRow($model,'hp1'); ?>
        <?php echo $form->textFieldRow($model,'hp2'); ?>
        <?php echo $form->textFieldRow($model,'email'); ?>
        <?php echo $form->textFieldRow($model,'pin_bbm'); ?>
        
     <?php echo $form->select2Row(
                    $model,
                    'source_info_id',
                    array(
                        'data' => CHtml::listData(SourceInfo::model()->findAll(array()), 'source_info_id', 'source_info'),
                    )
                );
                
                ?>
                <?php echo $form->textAreaRow($model, 'description', array('class'=>'span4', 'rows'=>5)); ?>
     <?php echo $form->datepickerRow($model, 'date_join', array('prepend'=>'<i class="icon-calendar"></i>')); ?>
     <?php echo $form->radioButtonListInlineRow($model, 'subcribe',
        array('1'=>'Yes', '2' =>'No'),array('empty'=>'-')); ?>
      <?php echo $form->radioButtonListInlineRow($model, 'subcribe_via',
        array('Email'=>'Email', 'SMS/BBM/Whatsapp' =>'SMS/BBM/Whatsapp','Phone'=>'Phone'),array('empty'=>'-')); ?>
         
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
  
                                          jQuery('#filename').val(responseJSON['filename']); 
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
            <input type="hidden" name="filename" id="filename">
        </div>
        <hr>
        <h4>Patient History</h4>
        <br />
        <table>
            <tr>
                <td>1.</td>
                <td>Apakah Anda sedang menjalanin pengobatan tertentu?</td>
            </tr>
            <tr>
                <td></td>
                <td><?php $data = array('Ya'=>'Ya', 'Tidak'=>'Tidak');
                echo $form->radioButtonList($model_ch,'p_1',$data,array('empty'=>'-'));?></td>
            </tr>
            <tr>
                <td></td>
                <td>Obat / Vitamin</td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $form->textArea($model_ch,'obat_vitamin',array('rows'=>5, 'cols'=>20), array(
                )); ?></td>
                
            </tr>


            <tr>
                <td>2.</td>
                <td>Apakah Anda pernah / sedang dalam perawatan Dermatologist / Dokter Kulit ?</td>
            </tr>
            <tr>
                <td></td>
                <td><?php $data = array('Ya'=>'Ya', 'Tidak'=>'Tidak');
                echo $form->radioButtonList($model_ch,'p_2',$data,array('empty'=>'-'));?></td>
            </tr>
            <tr>
                <td></td>
                <td>Description</td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $form->textArea($model_ch,'p_2_desc',array('rows'=>5, 'cols'=>20), array(
                )); ?></td>
                
            </tr>


            <tr>
                <td>3.</td>
                <td>Apakah Anda pernah / sedang mengalami : </td>
            </tr>
           
            <tr>
                <td></td>
                <td>Description</td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $form->textArea($model_ch,'p_3',array('rows'=>5, 'cols'=>20), array(
                )); ?></td>
                
            </tr>


            <tr>
                <td>4.</td>
                <td>Berapa gelas air mineral yang anda konsumsi tiap hari ? </td>
            </tr>
           
          
            <tr>
                <td></td>
                <td><?php echo $form->textField($model_ch,'p_4'); ?> Gelas</td>
                
            </tr>



            <tr>
                <td>5.</td>
                <td>Apakah Anda mengidap penyakit : </td>
            </tr>
           
            <tr>
                <td></td>
                <td>Description</td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $form->textArea($model_ch,'p_5',array('rows'=>5, 'cols'=>20), array(
                )); ?></td>
                
            </tr>



             <tr>
                <td>6.</td>
                <td>Hanya Untuk Wanita :</td>
            </tr>
            <tr>
                <td></td>
                <td><?php $data = array('Sedang Menjalani Program Kehamilan'=>'Sedang Menjalani Program Kehamilan', 'Hamil'=>'Hamil','Kontrasepsi Oral'=>'Kontrasepsi Oral');
                echo $form->radioButtonList($model_ch,'p_6',$data,array('empty'=>'-'));?></td>
            </tr>


             <tr>
                <td>7.</td>
                <td>Seberapa parah tingkat kesakitan ambang nyeri anda ? </td>
            </tr>
            <tr>
                <td></td>
                <td><?php $data = array('Rendah'=>'Rendah', 'Sedang'=>'Sedang','Tinggi'=>'Tinggi');
                echo $form->radioButtonList($model_ch,'p_7',$data,array('empty'=>'-'));?></td>
            </tr>


           

        </table>
        <br />
         <?php echo $form->select2Row(
                    $model,
                    'status',
                    array(
                        'data' => array('0'=>'Not Complete','1'=>'Complete'),
                    )
                );
                
                ?>
<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
        </div>
<?php $this->endWidget(); ?>
