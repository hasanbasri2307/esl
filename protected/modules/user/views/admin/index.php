<?php

$this->breadcrumbs=array(
	
	UserModule::t('User'),
);

$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.admin.menu',array(
            'active'=>array('3'=>true),
        ));
?>
<div class="page-header position-relative">
    <h1>
            User  
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>


 <div class="row-fluid">
	<div class="span12">
    <?php
          $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Create',
                'url'=>array('create'),
        ));
		echo "&nbsp; &nbsp;";
		 $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Import',
                'url'=>array('import'),
        ));

 ?>
            <?php 
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type'=>'striped bordered',
                'dataProvider'=>$dataProvider,
                'template'=>"{items}\n{pager}",
				
                'id'=>'product-grid',
                'columns'=>array(
                    array('name'=>'username', 'header'=>'username'),
                    array('name'=>'email', 'header'=>'email'),
                    array('name'=>'auth_assignment.itemname', 'header'=>'Position'),
					 array('name'=>'profile.branch.branch_name', 'header'=>'Branch'),
					 array('name'=>'profile.jabatan.nama_jabatan', 'header'=>'Jabatan'),
					  array('name'=>'profile.level_jabatan.level_jabatan', 'header'=>'Level Jabatan'),
					   array('name'=>'profile.divisi.nama_divisi', 'header'=>'Divisi'),
                    array('name'=>'lastvisit_at', 'header'=>'lastvisit at'),
                     array('name'=>'status', 'header'=>'Status', 'value'=>'User::itemAlias("UserStatus",$data->status)'),
                     array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        //--------------------- begin new code --------------------------
                        'buttons'=>array(
                                   
                                        ),
                    ),
                ),
            )); ?>

 
 
    </div>
</div>
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/user/admin/admin/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>


