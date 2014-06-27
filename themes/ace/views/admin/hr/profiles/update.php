<?php
$this->breadcrumbs=array(
	(HrModule::t('Employee')),
	$model->name=>array('view','id'=>$model->user_id),
	(HrModule::t('Update')),
);


$this->renderPartial('../menu',array(
            'active'=>array('2'=>true,'2.1'=>true),
        ));
?>
<div class="page-header position-relative">
    <h1>            <?php echo  HrModule::t('Update Employee')." ".$model->name; ?>
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
</div>
 




 