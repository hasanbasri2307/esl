<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Import'),
);

$this->menu=array(
		array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
		array('label'=>'Employee','icon' => 'icon-user', 'url'=>array('/user/profiles'), 'active'=>false),
        array('label'=>'User','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>true),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>false),
        array('label'=>'Branch','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>false),
);
?>
<div class="page-header position-relative">
    <h1>            Import User
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_upload', array('model'=>$model)); ?>

    </div>
</div>
 

