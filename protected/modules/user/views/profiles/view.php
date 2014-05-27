<?php
$this->breadcrumbs=array(
	UserModule::t('Employee'),
	$model->name,
);


$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.admin.menu',array(
            'active'=>array('2'=>true),
        ));
?>
<h1><?php echo UserModule::t('View Employee').' "'.$model->name.'"'; ?></h1>

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
		'npwp',
		'education_background',
			'working_location' ,
			'marital_status',
			'religion',
			'bank_name',
			'bank_account',
			'employee_status',
			'contract_start',
			'contract_jatuh_tempo' ,
			'id_type',
			'id_number' ,
			'remarks',
	);

	
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));
	

?>
