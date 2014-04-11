<?php

$this->breadcrumbs=array(
	'Products',
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.1'=>true),
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

            $this->widget('SpecialGridView', array(
                'type'=>'striped bordered',
                'dataProvider'=>$dataProvider,
                'template'=>"{items}{pager}",
                'branch_id'=> Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id'),         // your special parameter
                'id'=>'product-grid',
                'columns'=>array(
  
                    array('name'=>'product_number', 'header'=>'Product Number'),
                    array('name'=>'product_name', 'header'=>'Product Name'),
                   
                     array('name'=>'price', 'header'=>'Price'),
                    
                     array('name'=>'quantity', 'header'=>'Availability','value'=>'ProductStock::model()->find(
array("condition"=>"product_id =  $data->product_id AND  branch_id =".$this->grid->branch_id))->quantity'),
                     array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        //--------------------- begin new code --------------------------
                        'buttons'=>array(  ),
                         'template'=>'{view}',
                    ),
                ),
            )); ?>

 

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

