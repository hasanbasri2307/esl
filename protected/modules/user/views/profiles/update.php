<?php
$this->breadcrumbs=array(
	(UserModule::t('Employee')),
	$model->name=>array('view','id'=>$model->user_id),
	(UserModule::t('Update')),
);

$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.admin.menu',array(
            'active'=>array('2'=>true),
        ));
?>
<div class="page-header position-relative">
    <h1>            <?php echo  UserModule::t('Update Employee')." ".$model->name; ?>
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
 




 