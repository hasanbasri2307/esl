<?php
$this->breadcrumbs=array(
	'Master Products',
);

$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.4'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>
           Master Products  
            <small>
                    <i class="icon-double-angle-right"> Home Care</i>
                   
            </small>
    </h1>
</div>


 <div class="row-fluid">
	<div class="span12">
    <?php 
     
          $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Import',
                'url'=>array('import'),
        ));
 
 ?>
   
            <?php 
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type'=>'striped bordered',
                'dataProvider'=>$dataProvider,
                'template'=>"{items}{pager}",
                'id'=>'product-grid',
                'columns'=>array(
                    array('name'=>'product_number', 'header'=>'Product Code'),
                    array('name'=>'product_name', 'header'=>'Product Name'),
                     array('name'=>'productCategory.category_name', 'header'=>'Product Category'),
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

