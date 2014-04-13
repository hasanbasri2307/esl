<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
        
       
        <?php echo $form->textFieldRow($model,'product_name'); ?>
	<?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>5)); ?>
        <?php //echo $form->textFieldRow($model,'price_net',array('prepend'=>'Rp. ')); ?>

         <?php 
         $data = array(""=>"--Pilih--","Cleanser"=>"Cleanser","Toner"=>"Toner","Moisturizer & Moisturizing"=>"Moisturizer & Moisturizing","Intensive Care"=>"Intensive Care","Special Care"=>"Special Care");
         echo $form->select2Row(
                    $model,
                    'type',
                    array(
                        'data' => $data,
                    )
                );
        ?>
        <?php echo $form->radioButtonListInlineRow($model, 'unit_homecare', CHtml::listData(Unit::model()->findAll(array("condition"=>"type='homecare'")),'unit_id','unit_code')); ?>
        <?php echo $form->radioButtonListInlineRow($model, 'unit_cabin', CHtml::listData(Unit::model()->findAll(array("condition"=>"type='cabin'")),'unit_id','unit_code')); ?>
        <?php echo $form->radioButtonListInlineRow($model, 'product_category', CHtml::listData(ProductCategory::model()->findAll(),'id_product_category','category_name')); ?>
        <?php echo $form->textFieldRow($model,'netto'); ?>
        <?php echo $form->textFieldRow($model,'netto'); ?>

        <div class="control-group ">
            <label class="control-label required" for="Product_product_image">Image </label>
            <div class="controls">
                <div id="frame"> 
                <?php
                    
                         if(isset($model->image)!="" )
                             echo "<img src=\"".Yii::app()->request->baseUrl."/upload/product/".$model->image."\" />";
                    
                ?>
                </div>
                <span id="uploadedFile"> </span>
                <?php echo $form->hiddenField($model,'image'); ?>
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
										jQuery('#pm').val(responseJSON['filename']);    
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
            <input type="hidden" name="file" id="pm">
        </div>
          <?php
            $hide = " hide";
            if(isset($model->unit_id)){
               if($model->unit_id==7)
                   $hide = "";
            }
          ?>
         
   
       

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