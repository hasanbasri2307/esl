<?php
$this->breadcrumbs=array(
	'Promo',
);

$this->renderPartial('../menu',array(
			'active'=>array('2'=>true, '2.2'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>
            Promo
            <small>
                    <i class="icon-double-angle-right">Treatment Package  </i>
                   
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
                    array('name'=>'promo_number', 'header'=>'Promo Number'),
                    array('name'=>'name', 'header'=>'Name/Title'),
                    array('name'=>'price', 'header'=>'Price'),
                     array('name'=>'date_start', 'header'=>'Start'),
                     array('name'=>'date_end', 'header'=>'End'),
                    array(
                        'class'=>'bootstrap.widgets.TbButtonColumn',
                        //--------------------- begin new code --------------------------
                        'buttons'=>array(
                                   
                                        ),
                    ),
                ),
            )); ?>

 
 <?php
          $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Create',
                'url'=>array('create'),
        ));
 
 ?>
    </div>
</div>
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/accounting/treatmentpackage/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>

