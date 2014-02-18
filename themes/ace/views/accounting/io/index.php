<?php
$this->breadcrumbs=array(
	'Products',
);

$this->menu=array(
    array('label'=>'Master Product','icon' => 'icon-dashboard', 'url'=>array('/accounting/product'), 'active'=>false),
    array('label'=>'Product Set','icon' => 'icon-user', 'url'=>array('/accounting/productset'), 'active'=>false),
    array('label'=>'Treatment Package','icon' => 'icon-home', 'url'=>array('/accounting/treatmentpackage'), 'active'=>false),
    array('label'=>'In/Out','icon' => 'icon-flag', 'url'=>array('/accounting/io'), 'active'=>true),
    array('label'=>'Voucher','icon' => 'icon-flag', 'url'=>array('/accounting/voucher'), 'active'=>false),
);
?>
<div class="page-header position-relative">
    <h1>
            Products  
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
                    array('name'=>'product.product_number', 'header'=>'Product Number'),
                    array('name'=>'product.product_name', 'header'=>'Product Name'),
                    array('name'=>'description', 'header'=>'Description'),
                    array('name'=>'io', 'header'=>'Incoming/Outgoing','value'=> 'AccountingModule::in_out($data->io)'),
                    array('name'=>'quantity', 'header'=>'Qty'),
                    array('name'=>'quantity_deliver', 'header'=>'Qty_deliver'),
                     array('name'=>'status', 'header'=>'status','value'=> 'AccountingModule::status($data->status)'),
                     array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        //--------------------- begin new code --------------------------
                        'buttons'=>array(
                                   
                                        ),
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

