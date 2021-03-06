<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
        
        <?php echo $form->textFieldRow($model,'promo_number'); ?>
        <?php echo $form->textFieldRow($model,'name'); ?>
        <?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>5)); ?>
        <?php echo $form->textFieldRow($model,'price',array('prepend'=>'Rp. ')); ?>
         <?php echo $form->datepickerRow($model, 'date_start', array('prepend'=>'<i class="icon-calendar"></i>')); ?>
        <?php echo $form->datepickerRow($model, 'date_end', array('prepend'=>'<i class="icon-calendar"></i>')); ?>
        <?php echo $form->textFieldRow($model, 'discount', array('class'=>'input-small','append'=>'%')); ?>
        <?php echo $form->textFieldRow($model, 'discount_rp', array('prepend'=>'Rp. ','class'=>'input-small','append'=>'.00')); ?>
       
          <?php
            $hide = "";
           
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
			
            <?php if(isset($model_product) && !isset($_POST['ProductId'])){
			
                foreach($model_product as $row=>$val){
                   
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
   
    
 <table id="autocomplete_table2" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Treatment Number</th>
                            <th>Treatment Name</th>
                            <th>Qty</th>
                    </tr>
            </thead>
            <tbody>
            <?php if(isset($_POST['TreatmentId'])){
                foreach($_POST['TreatmentId'] as $row=>$val){
                    $TreatmentNumber = isset($_POST["TreatmentNumber"][$row])? $_POST["TreatmentNumber"][$row] : " " ;
                    $TreatmentName = isset($_POST["TreatmentName"][$row])? $_POST["TreatmentName"][$row] : " ";
                    $TreatmentQuantity = isset($_POST["TreatmentQuantity"][$row])? $_POST["TreatmentQuantity"][$row] : " ";
                    echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val.'" name="TreatmentId[]"><input readonly="readonly" type="text" value="'.$TreatmentNumber.'" name="TreatmentNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$TreatmentName.'" name="TreatmentName[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$TreatmentQuantity.'" name="TreatmentQuantity[]"></td>
                                    <td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'treatment'.$val.'\');" id="treatment'.$val.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>  
            <?php if(isset($model_treatment) && !isset($_POST['TreatmentId'])){
                foreach($model_treatment as $row=>$val){
                   echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val->treatment_id.'" name="TreatmentId[]"><input readonly="readonly" type="text" value="'.$val->treatment->treatment_number.'" name="TreatmentNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->treatment->treatment_name.'" name="TreatmentName[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->quantity.'" name="TreatmentQuantity[]"></td>
                                    <td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'treatment'.$val->treatment_id.'\');" id="treatment'.$val->treatment_id.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>
                <tr>
                    <td><?php echo CHtml::hiddenField('Treatment_id', '',array('readonly'=>'readonly')); ?>
                     <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Treatment_number',
                        'source'=>$this->createUrl('/admin/treatment/autocomplete_number'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Treatment_number").val( ui.item.label);
                                jQuery("#Treatment_name").val( ui.item.value2);
                                 jQuery("#Treatment_id").val(ui.item.value); 
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
                        'name' => 'Treatment_name',
                        'source'=>$this->createUrl('/admin/treatment/autocomplete_name'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Treatment_number").val( ui.item.value2);
                                jQuery("#Treatment_name").val( ui.item.label);
                                 jQuery("#Treatment_id").val(ui.item.value); 
                                return false;
                            }',
                            'select'=>'js:function( event, ui ) {
                                return false;
                            }'
                        ),
                        'htmlOptions'=>array( 'autocomplete'=>'off'),
                    )); ?>
                    
                    
                    
                    </td>
                    <td><?php echo CHtml::textField('Treatment_quantity', '',array('size'=>25)); ?></td>
                    <td><a   title="Add" rel="tooltip" href="#" onclick="" id="AddTreatment"><i class="icon-plus"></i></a></td>
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
    
	
	
	
	jQuery("input#Treatment_quantity").keypress(function (evt) {
            var charCode = evt.charCode || evt.keyCode;
            if (charCode  == 13) { 
                add_row2();
                return false;
            }
    });
     jQuery("#AddTreatment").click(function () {
         add_row2();
     });
    function add_row2(){
        jQuery('#autocomplete_table2 tr:last').before('<tr><td><input readonly="readonly" type="hidden" value="'+jQuery('#Treatment_id').val()+'" name="TreatmentId[]"><input readonly="readonly" type="text" value="'+jQuery('#Treatment_number').val()+'" name="TreatmentNumber[]"></td><td><input readonly="readonly" type="text" value="'+jQuery('#Treatment_name').val()+'" name="TreatmentName[]"></td><td><input readonly="readonly" type="text" value="'+jQuery('#Treatment_quantity').val()+'" name="TreatmentQuantity[]"></td><td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'treatment'+jQuery('#Treatment_id').val()+'\');" id="treatment'+jQuery('#Treatment_id').val()+'"><i class="icon-trash"></i></a></td></tr>');
        jQuery('#Treatment_name').val('');
        jQuery('#Treatment_quantity').val('');
         jQuery('#Treatment_id').val('');
        jQuery('#Treatment_number').val('');
        jQuery('#Treatment_number').focus();
        
    }
   
   
  
</script>