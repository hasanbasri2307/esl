<?php
$this->breadcrumbs=array(
	(UserModule::t('User'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
);

$this->menu=array(
		array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
		array('label'=>'Employee','icon' => 'icon-user', 'url'=>array('/profiles'), 'active'=>false),
        array('label'=>'User','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>true),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>false),
        array('label'=>'Branch','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>false),
        array('label'=>'Log Access','icon' => 'icon-flag', 'url'=>array('/admin/log'), 'active'=>false),
);
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
 




 