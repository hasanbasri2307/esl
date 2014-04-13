<?php
$this->breadcrumbs=array(
	'Incoming',
);

$this->renderPartial('../menu',array(
			'active'=>array('3'=>true, '3.1'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>
            Incoming  
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
                   array('name'=>'note', 'header'=>'DN','type'=>'raw','value'=>'CHtml::link($data->note,array("incoming/view/id/".$data->io_id))'),
                   array('name'=>'date', 'header'=>'date'),
                   array('name'=>'description', 'header'=>'Description'),  
                   array('name'=>'action', 'header'=>'Action','type'=>'raw','value'=>'AccountingModule::action_inventory($data->io_id,$data->status)'), 
                ),
            )); ?>
            
    </div>
</div>
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/inventory/incoming/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>

