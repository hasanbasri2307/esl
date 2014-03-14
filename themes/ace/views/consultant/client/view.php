
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
    <h1>            View Client #<?php echo $model->client_id; ?> <?php echo CHtml::link('(edit)',array('/consultant/client/update/id/'.$model->client_id)); ?>
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