
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
    <h1>             View Client #<?php echo $model->client_id; ?> <?php echo CHtml::link('(edit)',array('/frontdesk/client/update/id/'.$model->client_id)); ?>
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">
           
<?php 
$this->widget('bootstrap.widgets.TbButton', array(
                                'label'=>'Image',
                                'htmlOptions'=>array(
                                        'style'=>'margin-left:3px',
                                        'onclick'=>'js:bootbox.modal("<img src=\"'.Yii::app()->baseUrl."/upload/client/".$model->pict.'\"/>", "'.$model->client_name.'");'
                                ),
                          ));
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'client_id',
		'client_name',
		'title',
       array('name'=>'dob', 'label'=>'Date of Birthday'),
        array('name'=>'dop', 'label'=>'Date of Place'),
		 array('name'=>'sex.sex', 'label'=>'Gender'),
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
		'pin_bbm',
		'sourceInfo.source_info',
        'description',
        'subcribe',
        'subcribe_via',
    array('name'=>'branch.branch_name', 'label'=>'Join By Branch'),
    array('name'=>'date_join', 'label'=>'Date of Join'),
	
	),
)); 

?>
     
 
    </div>
</div>