<?php
$this->breadcrumbs=array(
	'Machine on Branch'=>array('index'),
	$model->branch->branch_name=>array('view','id'=>$model->mesin_detail_id),
	'Update',
);
$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true,'13.13'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>            Update Machine on Branch #<?php echo $model->mesin_detail_id; ?> (<?php echo $model->branch->branch_name;?>)
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