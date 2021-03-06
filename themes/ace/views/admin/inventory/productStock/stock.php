<?php
$this->breadcrumbs=array(
	'Master Stock Product',
);

$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.8'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>
            Master Stock Product 
            <small>
                    <i class="icon-double-angle-right"> Home Care</i>
                   
            </small>
    </h1>
</div>


 <div class="row-fluid">
 <?php if(Yii::app()->user->hasFlash('alert')): ?>
	<?php echo Yii::app()->user->getFlash('alert'); ?>
<?php endif; ?>
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
                    array('name'=>'product.product_number', 'header'=>'Product Code'),
                    array('name'=>'product.product_name', 'header'=>'Product Name'),
                     array('name'=>'quantity', 'header'=>'Quantity'),
                     array('name'=>'unit_homecare', 'header'=>'Unit','value'=>'$data->product->unitHomecare->unit_name'),
                     array('name'=>'product.price', 'header'=>'Price'),
                     
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
    window.location  = "<?php echo Yii::app()->createUrl('/inventory/productstock/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>

