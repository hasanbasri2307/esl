<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Prooduct Package'=>array('index'),
	$model->productpackage_id,
);

$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.8'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>            View Product Package #<?php echo $model->productpackage_id; ?>
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
		'productpackage_number',
		'productpackage_name',
		'price',
        'discount_percent',
		'discount_rp',
		'description',
	),
)); ?>


      <?php if(isset($model_product)){ ?>
               <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                    </tr>
            </thead>
            <tbody> 
                <?php
                foreach($model_product as $row=>$val){
                   echo '<tr>  <td>'.$val->product->product_number.'</td>
                                <td>'.$val->product->product_name.'</td>
                                <td>'.$val->quantity.'</td>
                          </tr>';
                }
                ?>
                  </tbody> 
        </table>
           <?php } ?> 
    
               
    </div>
</div>
 
