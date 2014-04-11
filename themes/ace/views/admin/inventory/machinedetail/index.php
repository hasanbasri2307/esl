<?php

$this->breadcrumbs=array(
	'Machine on Branch',
);

$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true,'13.7'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>
            Machine on Branch 
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
                'id'=>'product-grid',
                'columns'=>array(
                    array('name'=>'machine.mesin_number', 'header'=>'Machine Code'),
                    array('name'=>'machine.mesin_name', 'header'=>'Machine Name'),
                    array('name'=>'branch.branch_name','header'=>'Branch'),
                    array('name'=>'date_purchase','header'=>'Date of Purchase'),

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
    window.location  = "<?php echo Yii::app()->createUrl('/admin/room/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>
