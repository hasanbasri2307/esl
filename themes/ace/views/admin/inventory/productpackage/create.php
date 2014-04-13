<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Product Package'=>array('index'),
	'Create',
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.9'=>true),
		));
?>





<div class="page-header position-relative">
    <h1>            Create Product Package
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
</div>
 


