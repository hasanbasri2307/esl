<?php

$this->breadcrumbs=array(
	
	UserModule::t('Nurse'),
);

$this->renderPartial('webroot.themes.'.Yii::app()->theme->name.'.views.admin.menu',array(
            'active'=>array('2'=>true,'2.3'=>true),
        ));
?>
<div class="page-header position-relative">
    <h1>
            Nurse  
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>


 <div class="row-fluid">
	<div class="span12">
   
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
					 array('name'=>'jabatan.nama_jabatan', 'header'=>'Jabatan'),
					  array('name'=>'level_jabatan.level_jabatan', 'header'=>'Level Jabatan'),
					   array('name'=>'divisi.nama_divisi', 'header'=>'Divisi'),
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
    window.location  = "<?php echo Yii::app()->createUrl('/user/profiles/nurse/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>


