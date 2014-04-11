


<?php
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->room_name=>array('view','id'=>$model->room_id),
	'Update',
);

$this->renderPartial('../menu',array(
            'active'=>array('6'=>true),
        ));
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
           <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
</div>
 


