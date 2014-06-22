

         <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'horizontalForm',
        'type'=>'horizontal',
        
    )); ?>
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
    <div class="control-group">
        <label class="control-label" for="form-field-1">Client Name</label>

        <div class="controls">
            <?php
            $branch=Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
            $prof=0;
            $Criteria = new CDbCriteria();
            $Criteria->condition = "branch_id = $branch and face_profile = $prof";
            
                $this->widget(
                'bootstrap.widgets.TbSelect2',
                array(
                    'name' => 'client_id',
                    'model'=> $model,
                    'data' => CHtml::listData(Client::model()->findAll($Criteria) , 'client_id', 'client_number'),
                    'options' => array(
                        'placeholder' => 'type clever, or is, or just type!',
                        'width' => '20%',
                       
                        
                    ),
                    'htmlOptions' => array(
                            'class' => 'cc',
                            'id' =>'test',

                        ),
                )
            );
            ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="form-field-1">Client Name</label>

        <div class="controls">
            <input type="text"   id="client_name" readonly="true">
        </div>
    </div>    
    
    <?php echo $form->textAreaRow($model, 'problems', array('class'=>'span8', 'rows'=>5)); ?>
    <hr>
    <div class="control-group">
        <label class="control-label" for="form-field-1"><b>Facts</b></label>
        <br >

        <table border="0" >
            <tr>

                <td>1. Skin Texture</td>
                <td>:</td>
                <td>Grade</td>
                <td><input type="text" name="skintexture_grade"></td>
                <td>Level</td>
                <td><input type="text" name="skintexture_level"></td>
            </tr>
            <tr>

                <td>2. Pigmentation</td>
                <td>:</td>
                <td>Grade</td>
                <td><input type="text" name="pigmentation_grade"></td>
                <td>Level</td>
                <td><input type="text" name="pigmentation_level"></td>
            </tr>
            <tr>

                <td>3. Sebum</td>
                <td>:</td>
                <td>Grade</td>
                <td><input type="text" name="sebum_grade"></td>
                <td>Level</td>
                <td><input type="text" name="sebum_level"></td>
            </tr>
            <tr>

                <td>4. Skin Tone</td>
                <td>:</td>
                <td>Grade</td>
                <td><input type="text" name="skintone_grade"></td>
                <td>Level</td>
                <td><input type="text" name="skintone_level"></td>
            </tr>
            <tr>

                <td>5. Pores</td>
                <td>:</td>
                <td>Grade</td>
                <td><input type="text" name="pores_grade"></td>
                <td>Level</td>
                <td><input type="text" name="pores_level"></td>
            </tr>
            <tr>

                <td>6. Eye Wrinkles</td>
                <td>:</td>
                <td>Grade</td>
                <td><input type="text" name="eyewrinkles_grade"></td>
                <td>Level</td>
                <td><input type="text" name="eyewrinkles_level"></td>
            </tr>
            </table>
    </div> 
    <hr>
    <div class="control-group">
        <label class="control-label" for="form-field-1"><b>Summary</b></label>
        <br>

        <table>
            <tr>
                <td>Level of skin type</td>
                <td>:</td>
                <td><input type="radio" name="skin_type" value="dry">Dry <input type="radio" name="skin_type" value="normal">Normal <input type="radio" name="skin_type" value="combination">Combination <input type="radio" name="skin_type" value="sensitive">Sensitive</td>
            </tr>
            <tr>
                <td>Level of skin problem</td>
                <td>:</td>
                <td> <input type="radio" name="skin_problem" value="mild">Mild <input type="radio" name="skin_problem" value="moderate">Moderate <input type="radio" name="skin_problem" value="severe">Severe</td>
            </tr>  
        </table>
    </div>          
   
       
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
    </div>

<?php $this->endWidget(); ?>

     
<?php
 $url1 =$this->createUrl('/consultant/schedule/getClient');
 $script2 = ' $(".cc").change(function(){
            var id = $("#test").val();
            

            $.ajax({
            type:"POST",
            url:"'.$url1.'",
            cache:false,
            data:"id="+ id ,
            dataType:"json",
            success:function(data){
                $("#client_name").val(data.client_name);
                
                }
         });
        
    });
                    ';
  Yii::app()->clientScript->registerScript('getClientConsultant',$script2, CClientScript::POS_END);
?>

    

    </div>
</div>
 


