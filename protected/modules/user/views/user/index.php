<?php

$this->breadcrumbs=array(
	'Staff',
);

$this->menu=array(
	array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
        array('label'=>'Staffs','icon' => 'icon-user', 'url'=>array('/user'), 'active'=>false),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>false),
        array('label'=>'Branch Information','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>true),
);
?>
<div class="page-header position-relative">
    <h1>
            Staff  tes
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
                'template'=>"{items}",
                'id'=>'product-grid',
                'columns'=>array(
                    array('name'=>'username', 'header'=>'Username'),
                    array('name'=>'profile.name', 'header'=>'Name'),
                   
                     array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        //--------------------- begin new code --------------------------
                        'buttons'=>array(
                                   
                                        ),
                    ),
                ),
            )); ?>

 
 <?php
          $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Create',
                'url'=>array('/user/admin/create'),
        ));
 
 ?>
    </div>
</div>
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/user/admin/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>

