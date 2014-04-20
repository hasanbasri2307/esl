<?php
$this->breadcrumbs=array(
	'Treatment'=>array('index'),
	'Machine',
);

$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.11'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>            Create Treatment Machine for "<?php echo $model->treatment_name; ?>"
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
                            <th>Machine Code</th>
                            <th>Machine Name</th>
                             <th></th>
                    </tr>
            </thead>
            <tbody>
            <?php if(isset($_POST['MachineId'])){
                foreach($_POST['MachineId'] as $row=>$val){
                    $MachineNumber = isset($_POST["MachineNumber"][$row])? $_POST["MachineNumber"][$row] : " " ;
                    $MachineName = isset($_POST["MachineName"][$row])? $_POST["MachineName"][$row] : " ";
                     
                    echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val.'" name="MachineId[]"><input readonly="readonly" type="text" value="'.$MachineNumber.'" name="MachineNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$MachineName.'" name="MachineName[]"></td>
                                 
                                    <td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'machine'.$val.'\');" id="machine'.$val.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>  
            <?php if(isset($model_machine)){
                foreach($model_machine as $row=>$val){
                   
                   echo '<tr>  <td><input readonly="readonly" type="hidden" value="'.$val->machine_id.'" name="MachineId[]"><input readonly="readonly" type="text" value="'.$val->machine->mesin_number.'" name="MachineNumber[]"></td>
                                <td><input readonly="readonly" type="text" value="'.$val->machine->mesin_name.'" name="MachineName[]"></td>
                                
                                    <td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'machine'.$val->machine_id.'\');" id="machine'.$val->machine_id.'"><i class="icon-trash"></i></a></td>
                          </tr>';
                }
            }
            ?>
                <tr>
                    <td><?php echo CHtml::hiddenField('Machine_id', '',array('readonly'=>'readonly')); ?>
                     <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                        'name' => 'Machine_number',
                        'source'=>$this->createUrl('/service/machine/autocomplete_number'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Machine_number").val( ui.item.label);
                                jQuery("#Machine_name").val( ui.item.value2);
                                 jQuery("#Machine_id").val(ui.item.value); 
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
                        'name' => 'Machine_name',
                        'source'=>$this->createUrl('/service/machine/autocomplete_name'),
                        'value' => "",
                        'options' => array(
                            'minChars'=>1,
                            'autoFill'=>false,
                            'focus'=> 'js:function( event, ui ) {
                                jQuery("#Machine_number").val( ui.item.value2);
                                jQuery("#Machine_name").val( ui.item.label);
                                 jQuery("#Machine_id").val(ui.item.value); 
                                return false;
                            }',
                            'select'=>'js:function( event, ui ) {
                                return false;
                            }'
                        ),
                        'htmlOptions'=>array( 'autocomplete'=>'off'),
                    )); ?>
                    
                    
                    
                    </td>
                    
                    <td><a   title="Add" rel="tooltip" href="#" onclick="" id="AddMachine"><i class="icon-plus"></i></a></td>
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

    
     jQuery("#AddMachine").click(function () {
        
        if(jQuery('#Machine_name').val()!=""){
            add_row();
        }else{
            alert("error");
            return false;
        }
         
     });
    function add_row(){
        jQuery('#autocomplete_table tr:last').before('<tr><td><input readonly="readonly" type="hidden" value="'+jQuery('#Machine_id').val()+'" name="MachineId[]"><input readonly="readonly" type="text" value="'+jQuery('#Machine_number').val()+'" name="MachineNumber[]"></td><td><input readonly="readonly" type="text" value="'+jQuery('#Machine_name').val()+'" name="MachineName[]"></td><td><a class="delete2" title="Delete" rel="tooltip" href="#" onclick="javascript:delete_row(\'machine'+jQuery('#Machine_id').val()+'\');" id="machine'+jQuery('#Machine_id').val()+'"><i class="icon-trash"></i></a></td></tr>');
        jQuery('#Machine_name').val('');
        jQuery('#Machine_id').val('');
        jQuery('#Machine_number').val('');
        jQuery('#Machine_number').focus();
        
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
 

