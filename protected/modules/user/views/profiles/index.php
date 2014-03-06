<?php

$this->breadcrumbs=array(
	
	UserModule::t('Employee'),
);

$this->menu=array(
		array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
		array('label'=>'Employee','icon' => 'icon-user', 'url'=>array('/user/profiles'), 'active'=>true),
        array('label'=>'Staffs','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>false),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>false),
        array('label'=>'Branch','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>false),
);
?>
<div class="page-header position-relative">
    <h1>
            Employee  
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
 
 ?>
            <?php 
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type'=>'striped bordered',
                'dataProvider'=>$dataProvider,
                'template'=>"{items}\n{pager}",
				
                'id'=>'product-grid',
                'columns'=>array(
                    array('name'=>'name', 'header'=>'Name'),
                    array('name'=>'dob', 'header'=>'Birthday'),
                    array('name'=>'address', 'header'=>'Address'),
					array('name'=>'phone', 'header'=>'Phone'),
					 array('name'=>'profile.jabatan.nama_jabatan', 'header'=>'Jabatan'),
					  array('name'=>'profile.level_jabatan.level_jabatan', 'header'=>'Level Jabatan'),
					   array('name'=>'profile.divisi.nama_divisi', 'header'=>'Divisi'),
                    array('name'=>'lastvisit_at', 'header'=>'lastvisit at'),
                    
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
    window.location  = "<?php echo Yii::app()->createUrl('/user/profiles/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>


