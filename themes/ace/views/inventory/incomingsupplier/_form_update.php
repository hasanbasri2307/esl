<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
        <?php echo $form->hiddenField($model,'to'); ?>
        <div class="control-group "><label class="control-label" for="Io_from_name">From</label><div class="controls"><input readonly name="Io[Io_from_name]" id="Io_from_name" type="text" value="<?php echo $model->branch->branch_name;?>"></div></div>
        <?php echo $form->textAreaRow($model, 'description', array('readonly'=>'readonly','class'=>'span4', 'rows'=>5)); ?>
        <?php echo $form->textFieldRow($model, 'date', array('readonly'=>'readonly','prepend'=>'<i class="icon-calendar"></i>')); ?>
        <?php echo $form->textFieldRow($model, 'note', array('readonly'=>'readonly','prepend'=>'<i class="icon-calendar"></i>')); ?>
  
 <?php echo $form->datepickerRow($model, 'date_deliver', array('prepend'=>'<i class="icon-calendar"></i>')); ?>
        <?php
            $hide = "";
           
          ?>
          <table id="autocomplete_table" class="table table-striped table-bordered table-hover<?php echo $hide;?>">
            <thead>
                    <tr>
                            <th>Product Number</th>
                            <th>Product Name</th>
                            <th>Kadaluarsa</th>
                            <th>Qty</th>
                            <th>Qty Delivery</th>
                    </tr>
            </thead>
            <tbody>
            <?php if(isset($_POST['ProductId'])){
                foreach($_POST['ProductId'] as $row=>$val){
                    $ProductNumber = isset($_POST["ProductNumber"][$row])? $_POST["ProductNumber"][$row] : " " ;
                    $ProductName = isset($_POST["ProductName"][$row])? $_POST["ProductName"][$row] : " ";
                    $ProductQuantity = isset($_POST["ProductQuantity"][$row])? $_POST["ProductQuantity"][$row] : " ";
                     $kadaluarsa = isset($_POST["kadaluarsa"][$row])? $_POST["kadaluarsa"][$row] : " ";
                    echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val.'" name="ProductId[]"><input readonly="readonly" type="text" value="'.$ProductNumber.'" name="ProductNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$ProductName.'" name="ProductName[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$kadaluarsa.'" name="kadaluarsa[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$ProductQuantity.'" name="ProductQuantity[]"></td>
                                     <td><input readonly="readonly" type="text" value="'.$ProductQuantityDel.'" name="ProductQuantity[]"></td>
                                    
                          </tr>';
                }
            }
            ?>  
            <?php if(isset($model_product)){
                foreach($model_product as $row=>$val){
                   
                   echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val->io_detail_id.'" name="IoDetailId[]"><input readonly="readonly" type="hidden" value="'.$val->product_id.'" name="ProductId[]"><input readonly="readonly" type="text" value="'.$val->product->product_number.'" name="ProductNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->product->product_name.'" name="ProductName[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->kadaluarsa.'" name="kadaluarsa[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->quantity.'" name="ProductQuantity[]"></td>
                                 <td><input type="text" value="'.$val->quantity_deliver.'" name="ProductQuantityDeliver[]"></td>   
                          </tr>';
                }
            }
            ?>
          
            </tbody> 
        </table>
   
	<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
        </div>
<?php $this->endWidget(); ?>
 