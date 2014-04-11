<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Client',
);
$this->renderPartial('../../menu',array(
			'active'=>array('10'=>true,'10.1'=>true),
		));
?>



<div class="page-header position-relative">
    <h1>            Update Client
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
      
           <?php echo $this->renderPartial('_form', array('model'=>$model,'model_ch'=>$model_ch)); ?>

    </div>
</div>
 


