<?php
$this->breadcrumbs=array(
	'Machine on Branch'=>array('index'),
	'Create',
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true,'1.13'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>            Create Machine on Branch
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
 


