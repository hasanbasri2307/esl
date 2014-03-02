<?php

$this->breadcrumbs=array(
	'Supplier',
);

$this->renderPartial('../menu',array(
      'active'=>array('1'=>true,'1.2'=>true),
    ));
?>
<div class="page-header position-relative">
    <h1>
            Supplier  
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
                    array('name'=>'supplier_number', 'header'=>'Supplier Number'),
                    array('name'=>'supplier_name', 'header'=>'Supplier Name'),
                    array('name'=>'address','header'=>'Address'),
                    array('name'=>'phone','header'=>'Phone'),
                    array('name'=>'fax','header'=>'Fax'),
                    array('name'=>'contact_person','header'=>'Contact Person'),
                    array('name'=>'Jabatan','header'=>'Jabatan'),
                    array('name'=>'Email','header'=>'Email'),
                    array('name'=>'hp','header'=>'Handphone'),
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
    window.location  = "<?php echo Yii::app()->createUrl('/inventory/supplier/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>
