<?php
$this->breadcrumbs=array(
	'Products Cabin',
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.2'=>true),
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
                    array('name'=>'product_number', 'header'=>'Product Number'),
                    array('name'=>'product_name', 'header'=>'Product Name'),
                     array('name'=>'unit_id', 'header'=>'Unit','value'=>'$data->unit->unit_name'),
                     array('name'=>'price', 'header'=>'Price'),
                    array('name'=>'price', 'header'=>'Availability'),
                     array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        //--------------------- begin new code --------------------------
                        'buttons'=>array(  ),
                         'template'=>'{view}',
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

