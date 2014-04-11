<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Promo'=>array('index'),
	$model->promo_number,
);

$this->renderPartial('../menu',array(
			'active'=>array('2'=>true, '2.1'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>            View Promo #<?php echo $model->promo_number; ?>
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
		'promo_number',
		'name',
		'price',

	
		
	
	),
)); ?>      

      <?php if(isset($model_product)){ ?>
               <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Product Number</th>
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