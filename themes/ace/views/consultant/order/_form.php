<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
        
        <?php echo $form->textFieldRow($model,'order_number'); ?>
	
        <?php //echo $form->textFieldRow($model,'price_net',array('prepend'=>'Rp. ')); ?>
        <?php //echo $form->textFieldRow($model,'price',array('prepend'=>'Rp. ')); ?>
        <?php //echo $form->radioButtonListInlineRow($model, 'unit_homecare', CHtml::listData(Unit::model()->findAll(array("condition"=>"type='homecare'")),'unit_id','unit_code')); ?>
        <?php //echo $form->radioButtonListInlineRow($model, 'unit_cabin', CHtml::listData(Unit::model()->findAll(array("condition"=>"type='cabin'")),'unit_id','unit_code')); ?>
        <?php //echo $form->textFieldRow($model,'netto'); ?>
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
                            <th>Order Number</th>
                            <th>Order Name</th>
                            <th>Qty</th>
                    </tr>
            </thead>
            <tbody>
            <?php if(isset($_POST['OrderId'])){
                foreach($_POST['OrderId'] as $row=>$val){
                    $OrderNumber = isset($_POST["OrderNumber"][$row])? $_POST["OrderNumber"][$row] : " " ;
                    $OrderName = isset($_POST["OrderName"][$row])? $_POST["OrderName"][$row] : " ";
                    $OrderQuantity = isset($_POST["OrderQuantity"][$row])? $_POST["OrderQuantity"][$row] : " ";
                    echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val.'" name="OrderId[]"><input readonly="readonly" type="text" value="'.$OrderNumber.'" name="OrderNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$OrderName.'" name="OrderName[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$OrderQuantity.'" name="OrderQuantity[]"></td>
                                    <td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'order'.$val.'\');" id="order'.$val.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>  
            <?php if(isset($model_detail) && !$_POST['OrderId']){
                foreach($model_detail as $row=>$val){
                   
                   echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val->order_id.'" name="OrderId[]"><input readonly="readonly" type="text" value="'.$val->order->order_number.'" name="OrderNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->order->order_name.'" name="OrderName[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->quantity.'" name="OrderQuantity[]"></td>
                                    <td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'order'.$val->order_id.'\');" id="order'.$val->order_id.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>
                <tr>
                    <td><?php echo CHtml::hiddenField('Order_id', '',array('readonly'=>'readonly')); ?>
                     <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Order_number',
                        'source'=>$this->createUrl('/accounting/order/autocomplete_number'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Order_number").val( ui.item.label);
                                jQuery("#Order_name").val( ui.item.value2);
                                 jQuery("#Order_id").val(ui.item.value); 
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
                        'name' => 'Order_name',
                        'source'=>$this->createUrl('/accounting/order/autocomplete_name'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Order_number").val( ui.item.value2);
                                jQuery("#Order_name").val( ui.item.label);
                                 jQuery("#Order_id").val(ui.item.value); 
                                return false;
                            }',
                            'select'=>'js:function( event, ui ) {
                                return false;
                            }'
                        ),
                        'htmlOptions'=>array( 'autocomplete'=>'off'),
                    )); ?>
                    
                    
                    
                    </td>
                    <td><?php echo CHtml::textField('Order_quantity', '',array('size'=>25)); ?></td>
                    <td><a   title="Add" rel="tooltip" href="#" onclick="" id="AddOrder"><i class="icon-plus"></i></a></td>
                </tr>
            </tbody> 
        </table>
   
       

	<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Reset')); ?>
        </div>
<?php $this->endWidget(); ?>

        <script>

    jQuery("input#Order_quantity").keypress(function (evt) {
            var charCode = evt.charCode || evt.keyCode;
            if (charCode  == 13) { 
                add_row();
                return false;
            }
    });
     jQuery("#AddOrder").click(function () {
        
        if(jQuery('#Order_quantity').val()>0){
            add_row();
        }else{
            alert("Quantity error");
            return false;
        }
         
     });
    function add_row(){
        jQuery('#autocomplete_table tr:last').before('<tr><td><input readonly="readonly" type="hidden" value="'+jQuery('#Order_id').val()+'" name="OrderId[]"><input readonly="readonly" type="text" value="'+jQuery('#Order_number').val()+'" name="OrderNumber[]"></td><td><input readonly="readonly" type="text" value="'+jQuery('#Order_name').val()+'" name="OrderName[]"></td><td><input readonly="readonly" type="text" value="'+jQuery('#Order_quantity').val()+'" name="OrderQuantity[]"></td><td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'order'+jQuery('#Order_id').val()+'\');" id="order'+jQuery('#Order_id').val()+'"><i class="icon-trash"></i></a></td></tr>');
        jQuery('#Order_name').val('');
        jQuery('#Order_quantity').val('');
         jQuery('#Order_id').val('');
        jQuery('#Order_number').val('');
        jQuery('#Order_number').focus();
        
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
    
    jQuery(document).ready(function(){
         //alert(jQuery("input:radio[name=\"Order[unit_id]\"]").val());
        
    })
</script>