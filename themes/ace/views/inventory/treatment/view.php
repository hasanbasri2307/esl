<?php

$this->breadcrumbs=array(
	'Treatments'=>array('index'),
	$model->treatment_number,
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.11'=>true),
		));
?>

<h1>View Treatment #<?php echo $model->treatment_number; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
	
		'treatment_number',
		'treatment_name',
    'price',
		'description',
	),
)); ?>

<?php
 
 if(isset($model_product)){ ?>
 				<h4>Product</h4>
               <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                    </tr>
            </thead>
            <tbody> 
                <?php
				
                foreach($model_product as $row=>$val){
                   echo '<tr>  <td>'.$val->product->product_number.'</td>
                                <td>'.$val->product->product_name.'</td>
                                <td>'.$val->quantity.'</td>
                          </tr>';
                }
                ?>
                  </tbody> 
        </table>
           <?php } ?> 
           
           <?php if(isset($model_machine)){ ?>
           <h4>Machine</h4>
               <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Machine Code</th>
                            <th>Machine Name</th>
                            
                    </tr>
            </thead>
            <tbody> 
                <?php
                foreach($model_machine as $row=>$val){
                   echo '<tr>  <td>'.$val->machine->mesin_number.'</td>
                                <td>'.$val->machine->mesin_name.'</td>
                               
                          </tr>';
                }
                ?>
                  </tbody> 
        </table>
           <?php } ?> 
           
           <?php if(isset($model_procedure)){ ?>
           <h4>Procedure</h4>
               <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Title</th>
                            <th>Description</th>
                            
                    </tr>
            </thead>
            <tbody> 
                <?php
                foreach($model_procedure as $row=>$val){
                   echo '<tr>  <td>'.$val->title.'</td>
                                <td>'.$val->description.'</td>
                               
                          </tr>';
                }
                ?>
                  </tbody> 
        </table>
           <?php } ?> 
 
 <?php
          $this->widget('bootstrap.widgets.TbButton',array(
                'label' => ' Create Treatment Product',
                'url'=>array('treatment/product/id/'.$model->treatment_id),
        ));
          ?>
&nbsp;
<?php
           $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Create Treatment Procedure',
                'url'=>array('treatment/procedure/id/'.$model->treatment_id),
        ));
 
 ?>
&nbsp;
<?php
           $this->widget('bootstrap.widgets.TbButton',array(
                'label' => 'Create Treatment Machine',
                'url'=>array('treatment/machine/id/'.$model->treatment_id),
        ));
 
 ?>
 
 <?php 
 
 
