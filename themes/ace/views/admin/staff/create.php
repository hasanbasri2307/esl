<?php
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
        array('label'=>'Staffs','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>false),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>true),
        array('label'=>'Branch Information','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>false),
);
?>

<div class="page-header position-relative">
    <h1>            Create Branch
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
 


