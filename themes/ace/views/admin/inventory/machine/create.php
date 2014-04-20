<?php
$this->breadcrumbs=array(
	'Machine'=>array('index'),
	'Create',
);

$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true,'13.12'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>            Create Machine
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
 


