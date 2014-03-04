<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Inociming'=>array('index'),
	$model->io_id,
);

$this->renderPartial('../menu',array(
			'active'=>array('3'=>true, '3.2'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>            View Incoming #<?php echo $model->io_id; ?>
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
      <?php echo CHtml::link("Print",array("print","id"=>$model->io_id)) ?>       
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'branch.branch_name',
		'note',
		'description',
                'date',
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
 
