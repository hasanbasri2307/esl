<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
        
        <?php echo $form->textFieldRow($model,'product_number'); ?>
        <?php echo $form->textFieldRow($model,'product_name'); ?>
	<?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>5)); ?>
        <?php //echo $form->textFieldRow($model,'price_net',array('prepend'=>'Rp. ')); ?>
        <?php echo $form->textFieldRow($model,'price',array('prepend'=>'Rp. ')); ?>
        <?php echo $form->radioButtonListInlineRow($model, 'unit_homecare', CHtml::listData(Unit::model()->findAll(array("condition"=>"type='homecare'")),'unit_id','unit_code')); ?>
        <?php echo $form->radioButtonListInlineRow($model, 'unit_cabin', CHtml::listData(Unit::model()->findAll(array("condition"=>"type='cabin'")),'unit_id','unit_code')); ?>
        <?php echo $form->textFieldRow($model,'netto'); ?>
        <div class="control-group ">
            <label class="control-label required" for="Product_product_image">Image </label>
            <div class="controls">
                <div id="frame"> 
                <?php
                    
                         if(isset($model->image)!="" )
                             echo "<img src=\"".Yii::app()->request->baseUrl."/".$model->image."\" />";
                    
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
          <?php
            $hide = " hide";
            if(isset($model->unit_id)){
               if($model->unit_id==7)
                   $hide = "";
            }
          ?>
          <table id="autocomplete_table" class="table table-striped table-bordered table-hover<?php echo $hide;?>">
            <thead>
                    <tr>
                            <th>Product Number</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                    </tr>
            </thead>
            <tbody>
            <?php if(isset($_POST['ProductId'])){
                foreach($_POST['ProductId'] as $row=>$val){
                    $ProductNumber = isset($_POST["ProductNumber"][$row])? $_POST["ProductNumber"][$row] : " " ;
                    $ProductName = isset($_POST["ProductName"][$row])? $_POST["ProductName"][$row] : " ";
                    $ProductQuantity = isset($_POST["ProductQuantity"][$row])? $_POST["ProductQuantity"][$row] : " ";
                    echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val.'" name="ProductId[]"><input readonly="readonly" type="text" value="'.$ProductNumber.'" name="ProductNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$ProductName.'" name="ProductName[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$ProductQuantity.'" name="ProductQuantity[]"></td>
                                    <td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'product'.$val.'\');" id="product'.$val.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>  
            <?php if(isset($model_detail) && !$_POST['ProductId']){
                foreach($model_detail as $row=>$val){
                   
                   echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val->product_id.'" name="ProductId[]"><input readonly="readonly" type="text" value="'.$val->product->product_number.'" name="ProductNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->product->product_name.'" name="ProductName[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->quantity.'" name="ProductQuantity[]"></td>
                                    <td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'product'.$val->product_id.'\');" id="product'.$val->product_id.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>
                <tr>
                    <td><?php echo CHtml::hiddenField('Product_id', '',array('readonly'=>'readonly')); ?>
                     <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Product_number',
                        'source'=>$this->createUrl('/accounting/product/autocomplete_number'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Product_number").val( ui.item.label);
                                jQuery("#Product_name").val( ui.item.value2);
                                 jQuery("#Product_id").val(ui.item.value); 
                                return false;
                            }',
                            'select'=>'js:function( event, ui ) {
                                return false;
                            }'
                        ),
                        'htmlOptions'=>array( 'autocomplete'=>'off'),
                    )); ?>
                    </td>
                    <td>
                    
                   <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Product_name',
                        'source'=>$this->createUrl('/accounting/product/autocomplete_name'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Product_number").val( ui.item.value2);
                                jQuery("#Product_name").val( ui.item.label);
                                 jQuery("#Product_id").val(ui.item.value); 
                                return false;
                            }',
                            'select'=>'js:function( event, ui ) {
                                return false;
                            }'
                        ),
                        'htmlOptions'=>array( 'autocomplete'=>'off'),
                    )); ?>
                    
                    
                    
                    </td>
                    <td><?php echo CHtml::textField('Product_quantity', '',array('size'=>25)); ?></td>
                    <td><a   title="Add" rel="tooltip" href="#" onclick="" id="AddProduct"><i class="icon-plus"></i></a></td>
                </tr>
            </tbody> 
        </table>
   
       

	<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
        </div>
<?php $this->endWidget(); ?>

        <script>

    jQuery("input#Product_quantity").keypress(function (evt) {
            var charCode = evt.charCode || evt.keyCode;
            if (charCode  == 13) { 
                add_row();
                return false;
            }
    });
     jQuery("#AddProduct").click(function () {
        
        if(jQuery('#Product_quantity').val()>0){
            add_row();
        }else{
            alert("Quantity error");
            return false;
        }
         
     });
    function add_row(){
        jQuery('#autocomplete_table tr:last').before('<tr><td><input readonly="readonly" type="hidden" value="'+jQuery('#Product_id').val()+'" name="ProductId[]"><input readonly="readonly" type="text" value="'+jQuery('#Product_number').val()+'" name="ProductNumber[]"></td><td><input readonly="readonly" type="text" value="'+jQuery('#Product_name').val()+'" name="ProductName[]"></td><td><input readonly="readonly" type="text" value="'+jQuery('#Product_quantity').val()+'" name="ProductQuantity[]"></td><td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'product'+jQuery('#Product_id').val()+'\');" id="product'+jQuery('#Product_id').val()+'"><i class="icon-trash"></i></a></td></tr>');
        jQuery('#Product_name').val('');
        jQuery('#Product_quantity').val('');
         jQuery('#Product_id').val('');
        jQuery('#Product_number').val('');
        jQuery('#Product_number').focus();
        
    }
    function delete_row(id){
        jQuery("#"+id).parents('tr').remove();
    }
    jQuery("form").keypress(function (evt) {
            var charCode = evt.charCode || evt.keyCode;
            if (charCode  == 13) { 
               
                return false;
            }
    });
    jQuery("input:radio[name=\"Product[unit_homecare]\"]").change(function () {
           
            if (jQuery(this).val()  == 9) { 
               jQuery("#autocomplete_table").show();
                
            }else{
                jQuery("#autocomplete_table").hide();
            }
    });
    jQuery(document).ready(function(){
         //alert(jQuery("input:radio[name=\"Product[unit_id]\"]").val());
        
    })
</script>