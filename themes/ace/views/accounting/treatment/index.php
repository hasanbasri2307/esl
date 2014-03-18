<?php

$this->breadcrumbs=array(
	'Treatment',
);

$this->renderPartial('../menu',array(
			'active'=>array('2'=>true, '2.2'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>
            Treatment  
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>


 <div class="row-fluid">
	<div class="span12">
            <?php 
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type'=>'striped bordered',
                'dataProvider'=>$dataProvider,
                'template'=>"{items}{pager}",
                'id'=>'product-grid',
                'columns'=>array(
                    array('name'=>'treatment_number', 'header'=>'Treatment Code'),
                    array('name'=>'treatment_name', 'header'=>'Treatment Name'),
                    array('name' => 'price','header'=>'Treatment Price'),
                     array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        //--------------------- begin new code --------------------------
                        'buttons'=>array(
                                   
                                        ),
                    ),
                ),
            )); ?>

 

    </div>
</div>
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/accounting/treatment/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>
