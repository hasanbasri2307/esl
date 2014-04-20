<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Outgoing'=>array('index'),
	'Create',
);

$this->renderPartial('../../menu',array(
			'active'=>array('14'=>true, '14.2'=>true),
		));
?>





<div class="page-header position-relative">
    <h1>            Create Outgoing
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
 


