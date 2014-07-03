


<?php
$this->breadcrumbs=array(
	'Schedule Room'=>array('index'),
	'Create',
);

$this->renderPartial('../menu',array(
			'active'=>array('3'=>true,'3.3'=>true),
		));
		?>

<div class="page-header position-relative">
    <h1>            Create Schedule Room 
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    </div>
    
 <div class="row-fluid">
 <?php if(Yii::app()->user->hasFlash('alert')): ?>
 

    <?php echo Yii::app()->user->getFlash('alert'); ?>

 
<?php endif; ?>
	<div class="span12">

         <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id'=>'horizontalForm',
		'type'=>'horizontal',
		
	)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model,'<button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i></button>'); ?>
	<div class="control-group">
        <label class="control-label" for="form-field-1">Order Number</label>

        <div class="controls">
            <?php
            $branch=Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
            $status = 1;
            $Criteria = new CDbCriteria();
            $Criteria->condition = "branch_id = $branch and status=1";
            
                $this->widget(
                'bootstrap.widgets.TbSelect2',
                array(
                    'name' => 'order_nubmer',
                    'model'=> $model->order_number,
                    'data' => CHtml::listData(Order::model()->findAll($Criteria) , 'order_number', 'order_number'),
                    'options' => array(
                        'placeholder' => 'type clever, or is, or just type!',
                        'width' => '20%',
                       
                        
                    ),
                  
                )
            );
            ?>
        </div>
    </div>
    <div class="control-group">
		<label class="control-label" for="form-field-1">Client Name</label>

		<div class="controls">
			<?php
			$branch=Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
			$Criteria = new CDbCriteria();
			$Criteria->condition = "branch_id = $branch";
			
				$this->widget(
                'bootstrap.widgets.TbSelect2',
                array(
                    'name' => 'client_id',
                    'model'=> $model->client_id,
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
    
	<?php echo $form->datepickerRow(
		$model,
		'date_t',
		array(
		'prepend' => '<i class="icon-calendar"></i>'
		)
    ); ?>
    <?php echo $form->timepickerRow(
		$model,
		'time_t',
		array(
		'noAppend' => false,
		'class' => 'input-small',
		'options' => array(
			'showMeridian' => false
			)
		)
	); ?>
    <?php echo $form->timepickerRow(
		$model,
		'duration',
		array(
		'noAppend' => false,
		'class' => 'input-small',
		'options' => array(
			'showMeridian' => false
			)
		)
	); ?>


	
       <div class="control-group ">


         <?php echo $form->dropDownListRow(
                    $model,
                    'room_id',
                    array(
                        'Pilih' => CHtml::listData(Room::model()->findAll(array(
        'condition'=>'branch_id=:branch', 
        'params'=>array(':branch'=>Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id'))
    )), 'room_id', 'room_name'),
                    )
                );
				
                
                ?>

               <?php 

               echo $form->dropDownListRow(
                    $model,
                    'doctor',
                    array(
                        'Pilih' => CHtml::listData(Profiles::model()->findAll(array(
        'condition'=>'id_jabatan=:jabatan or id_jabatan=:jabatan2  and branch_id =:branch', 
        'params'=>array(':branch'=>Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id'),':jabatan'=>38,':jabatan2'=>33)
    )), 'user_id', 'name'),
                    )
                );
				
                
                ?>

                <?php echo $form->dropDownListRow(
                    $model,
                    'beautician',
                    array(
                        'Pilih' => CHtml::listData(Profile::model()->findAll(array(
        'condition'=>'id_jabatan=:jabatan and branch_id =:branch', 
        'params'=>array(':branch'=>Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id'),':jabatan'=>39)
    )), 'user_id', 'name'),
                    )
                );
				
                
                ?>
       
    <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'reset', 'label'=>'Cancel')); ?>
    </div>

<?php $this->endWidget(); ?>

     
<?php
 $url1 =$this->createUrl('/frontdesk/schedule/getClient');
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
 


