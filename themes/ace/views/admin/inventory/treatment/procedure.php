<?php
$this->breadcrumbs=array(
	'Treatment'=>array('index'),
	'Procedure',
);

$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.5'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>            Create Treatment Procedure for "<?php echo $model->treatment_name; ?>"
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
                     <?php echo $form->textFieldRow($model_procedure,'title'); ?> 
                     <?php echo $form->textAreaRow($model_procedure, 'description', array('class'=>'span8', 'rows'=>5)); ?> 
    </div>
          <div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Submit')); ?>
        
    </div>
<?php $this->endWidget(); ?>

 
    </div>
 <div class="row-fluid">
	<div class="span12">
            <?php 
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type'=>'striped bordered',
                'dataProvider'=>$procedure,
                'template'=>"{items}{pager}",
                'id'=>'product-grid',
                'columns'=>array(
                    array('name'=>'title', 'header'=>'Title'),
                    array('name'=>'description', 'header'=>'Description'),
                    /*
                     array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        //--------------------- begin new code --------------------------
                        'buttons'=>array(
                                   
                                        ),
                    ),
                     * */
                     
                ),
            )); ?>

 
 <?php
          $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Create',
                'url'=>array('create'),
        ));
 
 ?>
    </div>
</div>  
</div>
 

