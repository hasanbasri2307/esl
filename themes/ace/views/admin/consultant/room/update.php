


<?php
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->room_name=>array('view','id'=>$model->room_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
        array('label'=>'Staffs','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>false),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>true),
        array('label'=>'Branch Information','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>false),
);
?>

<div class="page-header position-relative">
    <h1>            Update Room #<?php echo $model->room_name; ?>
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php 
           foreach ($room_treatment as $key => $value) {
               print $value->room_treatment_id;
           }
echo $this->renderPartial('_form',  array('model'=>$model,'room_treatment'=>$room_treatment)); ?>

    </div>
</div>
 


