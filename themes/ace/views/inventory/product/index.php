<?php
$this->breadcrumbs=array(
	'Products',
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.4'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>
            Products  
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
                'id'=>'product-grid',
                'columns'=>array(
                    array('name'=>'product_number', 'header'=>'Product Code'),
                    array('name'=>'product_name', 'header'=>'Product Name'),
                     array('name'=>'unit_homecare', 'header'=>'Satuan','value'=>'$data->unitHomecare->unit_name'),
                     array('name'=>'price', 'header'=>'Price'),
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
    window.location  = "<?php echo Yii::app()->createUrl('/inventory/product/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>

