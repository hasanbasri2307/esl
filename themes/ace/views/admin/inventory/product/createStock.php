<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.4'=>true),
		));
?>




<div class="page-header position-relative">
    <h1>            Create Product Stock
            <small> 
                    <i class="icon-double-angle-right">Home Care</i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_formStock', array('model'=>$model)); ?>

    </div>
</div>
 


