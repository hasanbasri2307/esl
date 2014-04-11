<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Inociming'=>array('index'),
	$model->io_id,
);

$this->renderPartial('../../menu',array(
			'active'=>array('14'=>true, '14.3'=>true),
		));
?>

    
 <div class="row-fluid">
	<div class="span12">
           
<?php 
/*
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
            'note',
            'date',
		'branch.branch_name',
                
		
            
		'description',
                
	),
)); */?>
            <div id="logo2" class="left"> </div>
            
            
            <br class="clear" style="padding-top: 18px;clear: both;">
              <br class="clear" style="padding-top: 18px;clear: both;">
           <table id="autocomplete_table" class="table">
                <tr> 
                   
                    <td> <span  class="label2"> Branch Name</span> : <?php echo $model->branch->branch_name;?></td>
                   <td width="50%"> </td>
                     
                    <td style=""> <span  class="label2"> Note</span> : <?php echo $model->note;?></td>
                
                </tr>
                <tr> 
                   
                  
                    <td><span  class="label2"> Description</span>  : <?php echo $model->description;?></td>
                    <td width="50%"> </td>
                    <td> <span  class="label2"> Date</span>  : <?php echo date("d-m-Y",strtotime($model->date)); ?></td>
                
                </tr>
            </table>


      <?php if(isset($model_product)){ ?>
    <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Product Number</th>
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
    
     <br class="clear" style="padding-top: 18px;clear: both;">
     <table class="noborder table">
                    <tr>
                        <td style="text-align: left">Prepared by, </td>
                            <td style="text-align: center">Delivered by, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
                            <td style="text-align: right">Received by, &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</td>
                    </tr>
                    <tr>
                        <td style="text-align: left">
                             <br class="clear" style="padding-top: 180px;clear: both;">
                            ________________________</td>
                            <td style="text-align: center">
                             <br class="clear" style="padding-top: 180px;clear: both;">
                            ________________________</td>
                             <td style="text-align: right">
                             <br class="clear" style="padding-top: 180px;clear: both;">
                            ________________________</td>
                    </tr>
             
        </table>
    </div>
</div>
 
