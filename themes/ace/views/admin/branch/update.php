<?php
/* @var $this BranchController */
/* @var $model Branch */

$this->breadcrumbs=array(
	'Branches'=>array('index'),
	$model->branch_number=>array('view','id'=>$model->branch_id),
	'Update',
);

$this->menu=array(
	array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
	array('label'=>'Employee','icon' => 'icon-user', 'url'=>array('/user/profiles'), 'active'=>false),
        array('label'=>'User','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>false),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>false),
        array('label'=>'Branch Information','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>true),
);
?>

<h1>Update Branch <?php echo $model->branch_number; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>