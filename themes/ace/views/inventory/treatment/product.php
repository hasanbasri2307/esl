<?php
$this->breadcrumbs=array(
	'Treatment'=>array('index'),
	'Product',
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.11'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>            Create Tretment Product for "<?php echo $model->treatment_name; ?>"
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
 
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	          <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Product Code</th>
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
            <?php if(isset($model_product)){
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
    
    </div>
          <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        <?php //$this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
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
    
  
</script>
	

    </div>
</div>
 

