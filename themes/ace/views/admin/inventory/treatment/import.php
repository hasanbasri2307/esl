<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Treatment',
);
$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.11'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>            Import Treatment
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
 <?php if(Yii::app()->user->hasFlash('alert')): ?>
    <?php echo Yii::app()->user->getFlash('alert'); ?>
<?php endif; ?>
	<div class="span12">
           <?php echo $this->renderPartial('_upload', array('model'=>$model)); ?>

    </div>
</div>
 


