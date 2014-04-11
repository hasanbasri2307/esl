<?php
$this->breadcrumbs=array(
	UserModule::t('User')=>array('admin'),
	$model->username,
);


$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.admin.menu',array(
            'active'=>array('3'=>true),
        ));
?>
?><h1><?php echo UserModule::t('View User').' "'.$model->username.'"'; ?></h1>

<?php
 
	$attributes = array(
		'id',
		'username',
        'profile.name',
        'profile.branch.branch_name',
		'profile.divisi.nama_divisi',
		'profile.level_jabatan.level_jabatan',
		'profile.jabatan.nama_jabatan',
	);

	array_push($attributes,

		'email',
		'lastvisit_at',
		
		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		)
	);
	
	$this->widget('bootstrap.widgets.TbDetailView', array(
		'data'=>$model,
		'attributes'=>$attributes,
	));
	

?>
