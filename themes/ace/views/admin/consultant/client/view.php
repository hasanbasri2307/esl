
<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Client',
);
$this->renderPartial('../../menu',array(
			'active'=>array('10'=>true,'10.1'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>            View Client #<?php echo $model->client_id; ?> <?php echo CHtml::link('(edit)',array('/admin/consultant/client/update/id/'.$model->client_id)); ?>
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
		'client_middle_name',
		'client_last_name',
		'title',
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
		'pin_bbm',
		'sourceInfo.source_info',
        'description',
    array('name'=>'branch.branch_name', 'label'=>'Join By Branch'),
    'date_join',
		
	
		
	),
)); 

?>
<br />
<h4>Patient History</h4>
<table>
  <tr>
                <td>1.</td>
                <td><mark>Apakah Anda sedang menjalanin pengobatan tertentu?</mark></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $model_ch->p_1;?></td>
            </tr>
            <tr>
                <td></td>
                <td><mark>Obat / Vitamin :</mark> </td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $model_ch->obat_vitamin;?></td>
                
            </tr>


            <tr>
                <td>2.</td>
                <td><mark>Apakah Anda pernah / sedang dalam perawatan Dermatologist / Dokter Kulit ?</mark></td>
            </tr>
            <tr>
                <td></td>
                <td><<?php echo $model_ch->p_2;?></td>
            </tr>
            <tr>
                <td></td>
                <td><mark>Description :</mark></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $model_ch->p_2_desc;?></td>
                
            </tr>


            <tr>
                <td>3.</td>
                <td><mark>Apakah Anda pernah / sedang mengalami : </mark></td>
            </tr>
           
            <tr>
                <td></td>
                <td><mark>Description :</mark></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $model_ch->p_3;?></td>
                
            </tr>


            <tr>
                <td>4.</td>
                <td><mark>Berapa gelas air mineral yang anda konsumsi tiap hari ? </mark></td>
            </tr>
           
          
            <tr>
                <td></td>
                <td><?php echo $model_ch->p_4;?> Gelas</td>
                
            </tr>



            <tr>
                <td>5.</td>
                <td><mark>Apakah Anda mengidap penyakit : </mark></td>
            </tr>
           
            <tr>
                <td></td>
                <td><mark>Description : </mark></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $model_ch->p_5;?></td>
                
            </tr>



             <tr>
                <td>6.</td>
                <td><mark>Hanya Untuk Wanita : </mark></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $model_ch->p_6;?></td>
            </tr>


             <tr>
                <td>7.</td>
                <td><mark>Seberapa parah tingkat kesakitan ambang nyeri anda ? </mark></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $model_ch->p_7;?></td>
            </tr>


            <tr>
                <td></td>
                <td><mark>No. Rekam Medis </mark></td>
            </tr>
            <tr>
                <td></td>
                <td><?php echo $model_ch->rekam_medik_id;?></td>
            </tr>
    </table>
    <br />
<h4>History Treathment</h4>
  <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Treathment Name</th>
                            <th>Date</th>
                            <th>Qty</th>
                    </tr>
            </thead>
            <tbody> 
                
                  <tr>  <td>-</td>
                        <td>-</td>
                         <td>-</td>
                     </tr>
               
                  </tbody> 
        </table>
<br />
<h4>History Product</h4>
  <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Product Name</th>
                            <th>Date</th>
                            <th>Qty</th>
                    </tr>
            </thead>
            <tbody> 
                
                  <tr>  <td>-</td>
                        <td>-</td>
                         <td>-</td>
                     </tr>
               
                  </tbody> 
        </table>

        <h4>History Transaksi</h4>
  <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Transaction ID</th>
                            <th>Date</th>
                            <th>Qty</th>
                    </tr>
            </thead>
            <tbody> 
                
                  <tr>  <td>-</td>
                        <td>-</td>
                         <td>-</td>
                     </tr>
               
                  </tbody> 
        </table>
     
 
    </div>
</div>