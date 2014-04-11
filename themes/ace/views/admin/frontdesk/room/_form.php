<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
	)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
	<?php echo $form->textFieldRow($model,'room_number'); ?>
	<?php echo $form->textFieldRow($model,'room_name'); ?>
       <div class="control-group ">

<?php 
     $sellect_all= '';
      if(isset($_POST['sellect_all'])){
          if($_POST['sellect_all']==true){
              $sellect_all= ' checked="checked"';
              
          }
      }
     
        echo $form->select2Row(
                    $room_treatment,
                    'treatment_id',
                    array(
                        'data' => CHtml::listData(Treatment::model()->findAll(), 'treatment_id', 'treatment_name'),
                        'asDropDownList' => true,
                         'options' => array(
                            ),
                        'multiple' => 'multiple',
                        'append'=>'<input name="sellect_all" type="checkbox" id="sellect_all"'.$sellect_all.'>Select All'
                    )
                );
      ?>
           
                 
      
        
       
         <?php echo $form->select2Row(
                    $model,
                    'branch_id',
                    array(
                        'data' => CHtml::listData(Branch::model()->findAll(), 'branch_id', 'branch_name'),
                    )
                );
                
                ?>
        <?php echo $form->textAreaRow($model, 'description', array('class'=>'span8', 'rows'=>5)); ?>
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
    </div>

<?php $this->endWidget(); ?>

        <script> 
        $("#sellect_all").click(function(){
            if($("#sellect_all").is(':checked') ){
                $("#RoomTreatment_treatment_id > option").prop("selected","selected");
                $("#RoomTreatment_treatment_id").trigger("change");
            }else{
                $("#RoomTreatment_treatment_id > option").removeAttr("selected");
                 $("#RoomTreatment_treatment_id").trigger("change");
             }
        });
        
        </script>


	