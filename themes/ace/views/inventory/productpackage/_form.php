<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
   
   		<?php echo $form->textFieldRow($model,'productpackage_name'); ?>
        <?php echo $form->textFieldRow($model,'price',array('prepend'=>'Rp. ','id'=>'price')); ?>
        <?php echo $form->textFieldRow($model,'discount_percent',array('prepend'=>'% ')); ?>
        <?php echo $form->textFieldRow($model,'discount_rp',array('prepend'=>'Rp. ','id'=>'discount_rp')); ?>
		
        <?php echo $form->textAreaRow($model, 'description', array('class'=>'span4', 'rows'=>5)); ?>
      
       
        
        <?php
            $hide = "";
           
          ?>
          <table id="autocomplete_table" class="table table-striped table-bordered table-hover<?php echo $hide;?>">
            <thead>
                    <tr>
                            <th>Product Number</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
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
            <?php if(isset($model_product)){
                foreach($model_product as $row=>$val){
                   
                   echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val->productpackage_detail_id.'" name="id[]"><input readonly="readonly" type="hidden" value="'.$val->productpackage_id.'" name="p_id[]"><input readonly="readonly" type="hidden" value="'.$val->product_id.'" name="ProductId[]"><input readonly="readonly" type="text" value="'.$val->product->product_number.'" name="ProductNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->product->product_name.'" name="ProductName[]"></td>
                                <td><input class="'.$val->productpackage_detail_id.'" type="text" value="'.$val->quantity.'" name="ProductQuantity[]"></td>
                                    <td><a class="'.$val->productpackage_detail_id.'" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row_db(\'product'.$val->productpackage_detail_id.'\','.$val->productpackage_detail_id.');" id="product'.$val->productpackage_detail_id.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>
                <tr>
                    <td><?php echo CHtml::hiddenField('Product_id', '',array('readonly'=>'readonly')); ?>
                     <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Product_number',
                        'source'=>$this->createUrl('/inventory/product/autocomplete_number'),
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
                        'source'=>$this->createUrl('/inventory/product/autocomplete_name'),
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
                   
                    <td><?php echo CHtml::textField('Product_quantity', '',array('size'=>25)); ?></td>
                    <td><a   title="Add" rel="tooltip" href="#" onclick="" id="AddProduct"><i class="icon-plus"></i></a></td>
                </tr>
            </tbody> 
        </table>
   
	<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
        </div>
<?php $this->endWidget(); ?>
<?php $url1 =$this->createUrl('/inventory/productpackage/deleteitem');?>
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
        var error = false;
        jQuery("input[name^=ProductId]").each(function() {
            if(jQuery('#Product_id').val() == jQuery(this).val()){
                error = true;
            }
        });
        if(error==false) {
        jQuery('#autocomplete_table tr:last').before('<tr><td><input readonly="readonly" type="hidden" value="'+jQuery('#Product_id').val()+'" name="ProductId[]"><input readonly="readonly" type="text" value="'+jQuery('#Product_number').val()+'" name="ProductNumber[]"></td><td><input readonly="readonly" type="text" value="'+jQuery('#Product_name').val()+'" name="ProductName[]"></td></td><td><input readonly="readonly" type="text" value="'+jQuery('#Product_quantity').val()+'" name="ProductQuantity[]"></td><td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'product'+jQuery('#Product_id').val()+'\');" id="product'+jQuery('#Product_id').val()+'"><i class="icon-trash"></i></a></td></tr>');
        jQuery('#Product_name').val('');
        jQuery('#Product_quantity').val('');
         jQuery('#Product_id').val('');
        jQuery('#Product_number').val('');
      
        jQuery('#Product_number').focus();
        }else{
            alert('produk sudah ada');
        }
        
    }
    function delete_row(id){
        jQuery("#"+id).parents('tr').remove();
    }
	
	function delete_row_db(id,idnya){
		
		$.ajax({
			type:"POST",
			url:"<?php echo $url1;?>",
			cache:false,
			data:"id="+ idnya ,
			success:function(){
				
				
          }
		});
		
        jQuery("#"+id).parents('tr').remove();
		
		
    }
    jQuery("form").keypress(function (evt) {
            var charCode = evt.charCode || evt.keyCode;
            if (charCode  == 13) { 
               
                return false;
            }
    });
    
</script>
 <?php
$path = Yii::app()->assetManager->publish(Yii::getPathOfAlias('application.scripts'));
Yii::app()->clientScript->registerScriptFile($path.'/jquery-number/jquery.number.min.js');

Yii::app()->clientScript->registerScript('form', "
$('#price').number(true, 2);
$('#discount_rp').number(true, 2);
$('#Product_wholesale_price').number( true, 2 );
");
?>

