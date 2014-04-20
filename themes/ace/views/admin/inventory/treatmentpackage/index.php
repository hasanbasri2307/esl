<?php
$this->breadcrumbs=array(
	'Treatment Package',
);

$this->renderPartial('../../menu',array(
			'active'=>array('13'=>true, '13.10'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>
            Treatment Package  
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>


 <div class="row-fluid">
	<div class="span12">
    <?php
          $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Create',
                'url'=>array('create'),
        ));
 
 ?>
            <?php 
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type'=>'striped bordered',
                'dataProvider'=>$dataProvider,
                'template'=>"{items}{pager}",
                'id'=>'product-grid',
                'columns'=>array(
                    array('name'=>'treatmentpackage_number', 'header'=>'Package Code'),
                    array('name'=>'treatmentpackage_name', 'header'=>'Name'),
                   	array('name'=>'price', 'header'=>'Price'),
                    array('name'=>'discount_percent', 'header'=>'Discount (%) '),
					array('name'=>'discount_rp', 'header'=>'Discount (Rp) '),
					
            
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
    window.location  = "<?php echo Yii::app()->createUrl('/inventory/treatmentpackage/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>

