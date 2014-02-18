<?php

$this->breadcrumbs=array(
	'Rooms',
);

$this->menu=array(
	array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
        array('label'=>'Staffs','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>false),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>false),
         array('label'=>'Treatment','icon' => 'icon-home', 'url'=>array('/admin/treatment'), 'active'=>true),
        array('label'=>'Branch Information','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>false),
);
?>
<div class="page-header position-relative">
    <h1>
            Treatment  
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
                'template'=>"{items}{pager}",
                'id'=>'product-grid',
                'columns'=>array(
                    array('name'=>'treatment_number', 'header'=>'Treatment Number'),
                    array('name'=>'treatment_name', 'header'=>'Treatment Name'),
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
                'url'=>array('create'),
        ));
 
 ?>
    </div>
</div>
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/admin/room/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>
