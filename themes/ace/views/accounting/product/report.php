<?php
$this->breadcrumbs=array(
	'Product Price  Report',
);

$this->renderPartial('../menu',array(
			'active'=>array('7'=>true, '7.1'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>
          Product Price Report  
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
                'url'=>array('productpricereport'),
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

