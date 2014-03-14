
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
    <h1>            View Client #<?php echo $model->client_id; ?>
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
		'client_id',
		'client_name',
		'sex.sex',
		'maritalStatus.marital_status',
		'nationality.nationality',
		'idcard.id_card',
		'id_card_number',
    'client_number',
		'address',
		'telephone',
		'hp1',
		'hp2',
		'phone_kantor',
		'email',
		'city',
		'zip_code',
		'telephone',
		'sourceInfo.source_info',
    'branch.branch_name',
    'date_join',
		'pict',
	
	
	),
)); 

?>
     
 
    </div>
</div>