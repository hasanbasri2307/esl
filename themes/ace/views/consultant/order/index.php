<?php
$this->breadcrumbs=array(
	'Orders',
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.1'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>
            Orders  
            <small>
                    <i class="icon-double-angle-right"> Home Care</i>
                   
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
                'id'=>'order-grid',
                'columns'=>array(
                    array('name'=>'order_number', 'header'=>'Order Number'),
                    array('name'=>'client_id', 'header'=>'Client', 'value'=>'$data->client->client_name'),
                     array('name'=>'total', 'header'=>'Total'),
                     array('name'=>'date', 'header'=>'Date'),
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
    window.location  = "<?php echo Yii::app()->createUrl('/consultant/order/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>

