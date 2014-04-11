<?php

$this->breadcrumbs=array(
	'Branches',
);
$this->renderPartial('../menu',array(
            'active'=>array('5'=>true),
        ));
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
