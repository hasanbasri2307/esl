<?php
$this->breadcrumbs=array(
	'Machine'=>array('index'),
	$model->mesin_name=>array('view','id'=>$model->mesin_id),
	'Update',
);
$this->renderPartial('../menu',array(
			'active'=>array('1'=>true,'1.12'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>            Update Machine #<?php echo $model->mesin_name; ?>
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