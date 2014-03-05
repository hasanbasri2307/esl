<?php

$this->breadcrumbs=array(
	'Rooms',
);

$this->renderPartial('../menu',array(
      'active'=>array('4'=>true,'4.1'=>true),
    ));
?>
<div class="page-header position-relative">
    <h1>
            Rooms  
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
                    array('name'=>'room_number', 'header'=>'Room Number'),
                    array('name'=>'room_name', 'header'=>'Room Name'),
                    array('name'=>'description','header'=>'Description'),
                    
                ),
            )); ?>

 

    </div>
</div>
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/consultant/room/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>
