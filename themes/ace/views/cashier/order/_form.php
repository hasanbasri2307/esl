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
                        'attribute'=>'client_id',
                        'model'=>$model,
                        'source'=>$this->createUrl('/consultant/schedule/autocomplete_name'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#c_id").val( ui.item.value);
                                 jQuery("#client_name").val( ui.item.label);
                                return false;
                            }',
                            'select'=>'js:function( event, ui ) {
                                return false;
                            }'
                        ),
                        'htmlOptions'=>array( 'autocomplete'=>'off','id'=>'client_name'),
                    )); ?>
        </div>
      </div>
        <input type="hidden" id="c_id" name="c_id">
       <br><br>
       <br>
        
        <?php
            $hide = "";
           
          ?>
          <table id="autocomplete_table" class="table table-striped table-bordered table-hover<?php echo $hide;?>">
            <thead>
                    <tr>
                            <th>Product Number</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotals</th>
                    </tr>
            </thead>
            <tbody>
            <?php if(isset($_POST['ProductId'])){
                foreach($_POST['ProductId'] as $row=>$val){
                    $ProductNumber = isset($_POST["ProductNumber"][$row])? $_POST["ProductNumber"][$row] : " " ;
                    $ProductName = isset($_POST["ProductName"][$row])? $_POST["ProductName"][$row] : " ";
                    $ProductQuantity = isset($_POST["ProductQuantity"][$row])? $_POST["ProductQuantity"][$row] : " ";
                     $ProductPrice = isset($_POST["ProductPrice"][$row])? $_POST["ProductPrice"][$row] : " ";
                    echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val.'" name="ProductId[]"><input readonly="readonly" type="text" value="'.$ProductNumber.'" name="ProductNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$ProductName.'" name="ProductName[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$ProductPrice.'" name="ProductPrice[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$ProductQuantity.'" name="ProductQuantity[]"></td>
                                    <td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'product'.$val.'\');" id="product'.$val.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>  
            <?php if(isset($model_product)){
                foreach($model_product as $row=>$val){
                   
                   echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val->id_detail_order.'" name="id[]"><input readonly="readonly" type="hidden" value="'.$val->productpackage_id.'" name="p_id[]"><input readonly="readonly" type="hidden" value="'.$val->product_id.'" name="ProductId[]"><input readonly="readonly" type="text" value="'.$val->product->product_number.'" name="ProductNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->product->product_name.'" name="ProductName[]"></td>
                                   <td><input class="'.$val->id_detail_order.'" type="text" value="'.$val->price.'" name="ProductPrice[]"></td>
                                <td><input class="'.$val->id_detail_order.'" type="text" value="'.$val->qty.'" name="ProductQuantity[]"></td>
                                    <td><a class="'.$val->id_detail_order.'" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row_db(\'product'.$val->productpackage_detail_id.'\','.$val->productpackage_detail_id.');" id="product'.$val->productpackage_detail_id.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>
                <tr>
                    <td><?php echo CHtml::hiddenField('Product_id', '',array('readonly'=>'readonly')); ?>
                     <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Product_number',
                        'source'=>$this->createUrl('/consultant/order/autocomplete_number'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Product_number").val( ui.item.label);
                                jQuery("#Product_name").val( ui.item.value2);
                                jQuery("#Product_id").val(ui.item.value); 
                                jQuery("#Price").val(ui.item.price); 
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
                        'source'=>$this->createUrl('/consultant/order/autocomplete_name'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Product_number").val( ui.item.value2);
                                jQuery("#Product_name").val( ui.item.label);
                                jQuery("#Product_id").val(ui.item.value);
                                 jQuery("#Price").val(ui.item.price); 
                                return false;
                            }',
                            'select'=>'js:function( event, ui ) {
                                return false;
                            }'
                        ),
                        'htmlOptions'=>array( 'autocomplete'=>'off'),
                    )); ?>
                    
                    
                    
                    </td>
                    
                    <td><?php echo CHtml::textField('Price', '',array('size'=>25,'id'=>'Price','readonly'=>'readonly')); ?></td>
                    <td><?php echo CHtml::textField('Product_quantity', '',array('size'=>25)); ?></td>
                    
                    <td><p id="subtotal"></p></td>
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
        var subtotal;
        var harga= jQuery('#Price').val();
        var qty = jQuery('#Product_quantity').val();
        subtotal = harga * qty;

        var error = false;
        jQuery("input[name^=ProductId]").each(function() {
            if(jQuery('#Product_id').val() == jQuery(this).val()){
                error = true;
            }
        });
        if(error==false) {

        jQuery('#autocomplete_table tr:last').before('<tr><td><input readonly="readonly" type="hidden" value="'+jQuery('#Product_id').val()+'" name="ProductId[]"><input readonly="readonly" type="text" value="'+jQuery('#Product_number').val()+'" name="ProductNumber[]"></td><td><input readonly="readonly" type="text" value="'+jQuery('#Product_name').val()+'" name="ProductName[]"></td></td><td><input readonly="readonly" type="text" value="'+jQuery('#Price').val()+'" name="ProductPrice[]"></td></td><td><input readonly="readonly" type="text" value="'+jQuery('#Product_quantity').val()+'" name="ProductQuantity[]"></td><td><p>'+toRp(subtotal)+'</p></td><td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'product'+jQuery('#Product_id').val()+'\');" id="product'+jQuery('#Product_id').val()+'"><i class="icon-trash"></i></a></td></tr>');
        jQuery('#Product_quantity').val('');
         jQuery('#Product_id').val('');
         jQuery('#Price').val('');
        jQuery('#Product_number').val('');
        jQuery('#Product_name').val('');
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
    
    function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp ' + rev2.split('').reverse().join('') + ',00';
}
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

