<?php
$this->breadcrumbs=array(
  'Order'=>array('index'),
  $model->order_number,
);

$this->renderPartial('../../menu',array(
      'active'=>array('9'=>true, '9.1'=>true),
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
          

    </div>
</div>