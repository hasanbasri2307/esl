<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Order'=>array('index'),
	'Create',
);

$this->renderPartial('../../menu',array(
			'active'=>array('9'=>true, '9.2'=>true),
		));
?>




<div class="page-header position-relative">
    <h1>            Create Order
            <small>
                    <i class="icon-double-angle-right">Home Care</i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
</div>
 


