<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Promo'=>array('index'),
	'Create',
);


$this->renderPartial('../menu',array(
			'active'=>array('2'=>true, '2.2'=>true),
		));
?>




<div class="page-header position-relative">
    <h1>            Create Promo
            <small>
                    <i class="icon-double-angle-right">Treatment Package </i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

    </div>
</div>
 


