<?php
$this->breadcrumbs=array(
	'Order'=>array('index'),
	$model->order_number,
);

$this->renderPartial('../menu',array(
			'active'=>array('1'=>true, '1.1'=>true),
		));
?>
<div class="page-header position-relative">
    <h1>            View Order #<?php echo $model->order_number; ?>
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
 <?php
 if($model->status ==0)
 {
    ?>
    <div class="alert alert-error">
                    <button type="button" class="close" data-dismiss="alert">
                      <i class="icon-remove"></i>
                    </button>

                    <strong>
                      <i class="icon-remove"></i>
                      Unpaid
                    </strong>

                    This order hasn't been paid !!
                    <br>
                  </div>
                  <?php

 }
 else
 {
   ?>
   <div class="alert alert-block alert-success">
                    <button type="button" class="close" data-dismiss="alert">
                      <i class="icon-remove"></i>
                    </button>

                    <strong>
                      <i class="icon-remove"></i>
                      Paid
                    </strong>

                    This order has been paid !!
                    <br>
                  </div>
                  <?php
 }
 ?>
	<div class="span12">
           
<?php 

$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'order_number',
		'date',
		'client.client_number',
		'client.client_name',
		
		
               
		
	
	),
)); 

?>

      <?php if(isset($model_detail)){ ?>
            <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Product Number</th>
                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Subtotal</th>

                    </tr>
            </thead>
            <tbody> 
                <?php
                $grand_total=0;
                foreach($model_detail as $row=>$val){
                   echo '<tr>  <td>'.$val->product->product_number.'</td>
                                <td>'.$val->product->product_name.'</td>
                                <td>'.$val->qty.'</td>
                                <td>'.Yii::app()->format->formatNumber($val->price).'</td>
                                 <td>'.Yii::app()->format->formatNumber($val->qty * $val->price).'</td>
                          </tr>';
                          $grand_total+=($val->qty * $val->price);
                }
                ?>
                  </tbody> 
        </table>
           <?php } ?> 
    
               
   <br > 
   <h4>Grand Total : IDR <?php echo Yii::app()->format->formatNumber($grand_total);?></h4>             
    <br/>
    <?php
    if($model->status ==0)
    {

      ?>
    <a href="<?php echo Yii::app()->createUrl('/cashier/order/payment/id/'.$model->order_id)?> " class="btn btn-app btn-yellow btn-mini">
                    <i class="icon-shopping-cart bigger-160"></i>
                    Pay
                  </a>

                  <?php
                }
  else
  {
    ?>
      <button class="btn btn-app btn-light btn-mini">
                    <i class="icon-print bigger-160"></i>
                    Print Invoice
                  </button>
                  <?php 
  }

                ?>

    </div>
</div>