<?php

$this->breadcrumbs=array(
	'Log Access',
);

$this->renderPartial('../menu',array(
            'active'=>array('6'=>true),
        ));
?>
<div class="page-header position-relative">
    <h1>
            Log Access  
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
                    array('name'=>'logtime', 'header'=>'Time'),
                    array('name'=>'user.username', 'header'=>'Username'),
                    array('name'=>'ip_address', 'header'=>'IP Address'),
                    array('name'=>'request_url', 'header'=>'URL'),
                     
                    ),
                
            )); ?>

 
 
    </div>
</div>
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/admin/log/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>
