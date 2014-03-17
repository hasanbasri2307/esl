<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
   
   		<?php echo $form->textFieldRow($model,'treatmentpackage_name'); ?>
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
                            <th>Treatment Number</th>
                            <th>Treatment Name</th>
                            <th>Quantity</th>
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
            <?php if(isset($model_treatment)){
                foreach($model_treatment as $row=>$val){
                   
                   echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val->treatmentpackage_detail_id.'" name="id[]"><input readonly="readonly" type="hidden" value="'.$val->treatmentpackage_id.'" name="t_id[]"><input readonly="readonly" type="hidden" value="'.$val->treatment_id.'" name="TreatmentId[]"><input readonly="readonly" type="text" value="'.$val->treatment->treatment_number.'" name="TreatmentNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->treatment->treatment_name.'" name="TreatmentName[]"></td>
                                <td><input class="'.$val->treatmentpackage_detail_id.'" type="text" value="'.$val->quantity.'" name="TreatmentQuantity[]"></td>
                                    <td><a class="'.$val->treatmentpackage_detail_id.'" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row_db(\'treatment'.$val->treatmentpackage_detail_id.'\','.$val->treatmentpackage_detail_id.');" id="treatment'.$val->treatmentpackage_detail_id.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>
                <tr>
                    <td><?php echo CHtml::hiddenField('Treatment_id', '',array('readonly'=>'readonly')); ?>
                     <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Treatment_number',
                        'source'=>$this->createUrl('/inventory/treatment/autocomplete_number'),
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
                        'source'=>$this->createUrl('/inventory/treatment/autocomplete_name'),
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
                    <td><a   title="Add" rel="tooltip" href="#" onclick="" id="AddProduct"><i class="icon-plus"></i></a></td>
                </tr>
            </tbody> 
        </table>
   
	<div class="form-actions">
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
            <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
        </div>
<?php $this->endWidget(); ?>
<?php $url1 =$this->createUrl('/inventory/treatmentpackage/deleteitem');?>
<script>

    jQuery("input#Treatment_quantity").keypress(function (evt) {
            var charCode = evt.charCode || evt.keyCode;
            if (charCode  == 13) { 
                add_row();
                return false;
            }
    });
     jQuery("#AddProduct").click(function () {
        
        if(jQuery('#Treatment_quantity').val()>0){
            add_row();
        }else{
            alert("Quantity error");
            return false;
        }
         
     });
    function add_row(){
        var error = false;
        jQuery("input[name^=TreatmentId]").each(function() {
            if(jQuery('#Treatment_id').val() == jQuery(this).val()){
                error = true;
            }
        });
        if(error==false) {
        jQuery('#autocomplete_table tr:last').before('<tr><td><input readonly="readonly" type="hidden" value="'+jQuery('#Treatment_id').val()+'" name="TreatmentId[]"><input readonly="readonly" type="text" value="'+jQuery('#Treatment_number').val()+'" name="TreatmentNumber[]"></td><td><input readonly="readonly" type="text" value="'+jQuery('#Treatment_name').val()+'" name="TreatmentName[]"></td></td><td><input readonly="readonly" type="text" value="'+jQuery('#Treatment_quantity').val()+'" name="TreatmentQuantity[]"></td><td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'treatment'+jQuery('#Treatment_id').val()+'\');" id="treatment'+jQuery('#Treatment_id').val()+'"><i class="icon-trash"></i></a></td></tr>');
        jQuery('#Treatment_name').val('');
        jQuery('#Treatment_quantity').val('');
         jQuery('#Treatment_id').val('');
        jQuery('#Treatment_number').val('');
      
        jQuery('#Treatment_number').focus();
        }else{
            alert('Treatment sudah ada');
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

