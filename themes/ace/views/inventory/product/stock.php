<?php
$this->breadcrumbs=array(
	'Products',
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.8'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>
            Products Stock  
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
                    array('name'=>'product.product_number', 'header'=>'Product Number'),
                    array('name'=>'product.product_name', 'header'=>'Product Name'),
                     array('name'=>'unit_homecare', 'header'=>'Unit','value'=>'$data->product->unitHomecare->unit_name'),
                     array('name'=>'product.price', 'header'=>'Price'),
                      array('name'=>'quantity', 'header'=>'Quantity'),
                     array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        //--------------------- begin new code --------------------------
                        'buttons'=>array(
                                        ),
                        'template'=>'{view}',
                    ),
                ),
            )); ?>

 
 
    </div>
</div>
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/inventory/product/stock/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>
