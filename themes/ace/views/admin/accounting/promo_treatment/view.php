<?php


$this->breadcrumbs=array(
	'Promo'=>array('index'),
	$model->promo_number,
);
$this->renderPartial('../menu',array(
			'active'=>array('2'=>true, '2.2'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>          View TreatmentPackage #<?php echo $model->promo_number; ?>
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
	<div class="span12">

           
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'promo_number',
		'name',
		'price',

	
		
	
	),
)); ?>
            
            <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Treatment Number</th>
                            <th>Treatment Name</th>
                            <th>Qty</th>
                    </tr>
            </thead>
            <tbody>
                <?php if(isset($treatment)){
                foreach($treatment as $row=>$val){
                   echo '<tr>  <td>'.$val->treatment->treatment_number.'</td>
                                <td>'.$val->treatment->treatment_name.'</td>
                                <td>'.$val->quantity.'</td>
                          </tr>';
                }
            }
            ?> 
                
            </tbody> 
        </table>

    </div>
</div>
 



