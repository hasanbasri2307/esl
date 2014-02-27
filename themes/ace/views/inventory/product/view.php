<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->product_number,
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.1'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>            View Product #<?php echo $model->product_number; ?>
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           
<?php 
$this->widget('bootstrap.widgets.TbButton', array(
                                'label'=>'Image',
                                'htmlOptions'=>array(
                                        'style'=>'margin-left:3px',
                                        'onclick'=>'js:bootbox.modal("<img src=\"'.Yii::app()->baseUrl."/".$model->image.'\"/>", "'.$model->product_name.'");'
                                ),
                          ));
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'product_number',
		'product_name',
		'description',
		'price',
		'unit.unit_name',
		
               
		
	
	),
)); 

?>
      <?php if(isset($model_detail)){ ?>
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
                foreach($model_detail as $row=>$val){
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