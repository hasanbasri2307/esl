<?php
$this->breadcrumbs=array(
	UserModule::t('Employee'),
	$model->name,
);


$this->menu=array(
		array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
		array('label'=>'Employee','icon' => 'icon-user', 'url'=>array('/user/profiles'), 'active'=>true),
        array('label'=>'Staffs','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>false),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>false),
        array('label'=>'Branch','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>false),
);
?><h1><?php echo UserModule::t('View Employee').' "'.$model->name.'"'; ?></h1>

<?php
 
	$attributes = array(
		'user_id',
		'name',
        'dob',
		'address',
		'phone',
        'branch.branch_name',
		'divisi.nama_divisi',
		'level_jabatan.level_jabatan',
		'jabatan.nama_jabatan',
	);

	
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));
	

?>
