<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Client',
);
$this->renderPartial('../menu',array(
			'active'=>array('2'=>true,),
		));
?>

<div class="page-header position-relative">
    <h1>            Clients
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
                'id'=>'branch-grid',
                'columns'=>array(
                    array('name'=>'client_name', 'header'=>'Name'),
                    array('name'=>'address', 'header'=>'Address'),
                   
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
    window.location  = "<?php echo Yii::app()->createUrl('/consultant/client/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>


