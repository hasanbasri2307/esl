<?php
$this->breadcrumbs=array(
	'Incoming Product Report',
);

$this->renderPartial('../../menu',array(
			'active'=>array('15'=>true, '15.3'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>
           Incoming Products Report  
            <small>
                    <i class="icon-double-angle-right"> Home Care</i>
                   
            </small>
    </h1>
</div>


 <div class="row-fluid">
	<div class="span12">
    <?php 
     
          $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Print PDF',
                'url'=>array('incomingpdf'),
        ));
 
 ?>
   
         

 
 
    </div>
</div>
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/inventory/product/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>

