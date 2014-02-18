<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->io_id,
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
    <h1>            View Incoming / Outgoing #<?php echo $model->product_id; ?>
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product.product_number',
		'product.product_name',
                array('name'=>'io', 'label'=>'Incoming/Outgoing','value'=> AccountingModule::in_out($model->io)),
                'quantity',
		'description',
		
		
		
	
	),
)); ?>


    </div>
</div>
 
