<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Treatment Package'=>array('index'),
	$model->treatmentpackage_id,
);

$this->renderPartial('../menu',array(
			'active'=>array('2'=>true, '2.4'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>            View Treatment Package #<?php echo $model->treatmentpackage_id; ?>
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
		'treatmentpackage_number',
		'treatmentpackage_name',
		'price',
        'discount_percent',
		'discount_rp',
		'description',
	),
)); ?>


      <?php if(isset($model_treatment)){ ?>
               <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Treatment Number</th>
                            <th>Treatment Name</th>
                            <th>Qty</th>
                    </tr>
            </thead>
            <tbody> 
                <?php
                foreach($model_treatment as $row=>$val){
                   echo '<tr>  <td>'.$val->treatment->treatment_number.'</td>
                                <td>'.$val->treatment->treatment_name.'</td>
                                <td>'.$val->quantity.'</td>
                          </tr>';
                }
                ?>
                  </tbody> 
        </table>
           <?php } ?> 
    
               
    </div>
</div>
 
