
<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Supplier',
);
$this->renderPartial('../menu',array(
			'active'=>array('1'=>true,'1.2'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>            View Supplier #<?php echo $model->supplier_number; ?>
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           
<?php 

$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'supplier_number',
		'supplier_name',
		'address',
		'phone',
		'fax',
		'hp',
		'Email',
		'Jabatan',
		'contact_person',
		'npwp',
		'nama_bank',
		'no_rekening',
		'kategori',
	),
)); 

?>
     
 
    </div>
</div>