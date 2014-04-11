<?php
/* @var $this BranchController */
/* @var $model Branch */

$this->breadcrumbs=array(
	'Branches'=>array('index'),
	$model->branch_number=>array('view','id'=>$model->branch_id),
	'Update',
);

$this->renderPartial('../menu',array(
            'active'=>array('5'=>true),
        ));
?>

<h1>Update Branch <?php echo $model->branch_number; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>