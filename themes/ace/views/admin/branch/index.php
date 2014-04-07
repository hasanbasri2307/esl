<?php

$this->breadcrumbs=array(
	'Branches',
);
$this->menu=array(
	array('label'=>'Dashboard','icon' => 'icon-dashboard', 'url'=>array('/admin'), 'active'=>false),
	array('label'=>'Employee','icon' => 'icon-user', 'url'=>array('/user/profiles'), 'active'=>false),
        array('label'=>'User','icon' => 'icon-user', 'url'=>array('/user/admin'), 'active'=>false),
        array('label'=>'Rooms','icon' => 'icon-home', 'url'=>array('/admin/room'), 'active'=>false),
        array('label'=>'Branch','icon' => 'icon-flag', 'url'=>array('/admin/branch'), 'active'=>true),
        array('label'=>'Log Access','icon' => 'icon-flag', 'url'=>array('/admin/log'), 'active'=>false),
);
?>
<div class="page-header position-relative">
    <h1>
            Branch  
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
                'template'=>"{items}{pager}",
                'id'=>'branch-grid',
                'columns'=>array(
                    array('name'=>'branch_number', 'header'=>'Branch Number'),
                    array('name'=>'branch_name', 'header'=>'Branch Name'),
                    array('name'=>'address', 'header'=>'Address'),
                    array('name'=>'phone', 'header'=>'Phone'),
                    array('name'=>'fax', 'header'=>'Fax'),
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
    window.location  = "<?php echo Yii::app()->createUrl('/admin/branch/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>
