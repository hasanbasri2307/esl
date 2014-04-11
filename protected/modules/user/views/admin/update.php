<?php
$this->breadcrumbs=array(
	(UserModule::t('User'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
);

$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.admin.menu',array(
            'active'=>array('3'=>true),
        ));
?>
<div class="page-header position-relative">
    <h1>            <?php echo  UserModule::t('Update User')." ".$model->username; ?>
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile,'auth_assignment'=>$auth_assignment)); ?>

    </div>
</div>
 




 