<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('index'),
	'Create',
);

$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.2'=>true),
		));
?>




<div class="page-header position-relative">
    <h1>            Create Product
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
 


