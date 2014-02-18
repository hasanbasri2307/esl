<?php
$this->breadcrumbs=array(
	'Outgoing',
);

$this->renderPartial('../menu',array(
			'active'=>array('3'=>true, '3.2'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>
            Outgoing  
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
                    array('name'=>'note', 'header'=>'DN'),
                    array('name'=>'branch.branch_name', 'header'=>'Branch'),
                   array('name'=>'date', 'header'=>'date'),
                    array('name'=>'description', 'header'=>'Description'),
                     array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                         
                        //--------------------- begin new code --------------------------
                        
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
    window.location  = "<?php echo Yii::app()->createUrl('/accounting/product/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>

