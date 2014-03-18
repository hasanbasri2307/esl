<?php
$this->breadcrumbs=array(
	'Products'=>array('index'),
	$model->product_number,
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.4'=>true),
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
    
                
          

    </div>
</div>