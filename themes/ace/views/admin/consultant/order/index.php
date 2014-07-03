<?php
$this->breadcrumbs=array(
	'Orders',
);

$this->renderPartial('../../menu',array(
			'active'=>array('9'=>true, '9.1'=>true),
		));
?>

<div class="page-header position-relative">
    <h1>
            Orders  
            <small>
                    <i class="icon-double-angle-right"> Home Care</i>
                   
            </small>
    </h1>
</div>
 <div class="row-fluid">
	<div class="span12">
            <table id="autocomplete_table" class="table table-striped table-bordered table-hover">
            <thead>
                    <tr>
                            <th>Order Number</th>
                            <th>Date</th>
                            <th>Client</th>
                            <th>Status Order</th>
                            <th></th>
                            

                    </tr>
            </thead>
            <tbody> 
                <?php
               
                foreach($model as $row=>$val){
                   ?>
                   <tr>
                        <td><?php echo $val->order_number;?></td>
                        <td><?php echo $val->date;?></td>
                        <td><?php echo $val->client->client_name;?></td>
                        <td><?php if($val->status==0) { echo '<span class="label label-important arrowed-in">Unpaid</span>';} else { echo '<span class="label label-success arrowed">Paid</span>';}?></td>
                        <td><a href="<?php echo Yii::app()->createUrl('/admin/consultant/order/view', array('id' => $val->order_id))?>">View</a></td>

                    </tr>
                    <?php 
                }
                ?>
                  </tbody> 
        </table>
         <div class="pagination">     <?php     $this->widget('CLinkPager', array(         'pages' => $pages,         'header' => '',         'nextPageLabel' => 'Next',         'prevPageLabel' => 'Prev',         'selectedPageCssClass' => 'active',         'hiddenPageCssClass' => 'disabled',         'htmlOptions' => array(             'class' => '',         )     ))     ?> </div> 
    </div>
</div>
 
<script type="text/javascript">

 jQuery('#nav-search-input').keypress(function (e) {
  if (e.which == 13) {
    window.location  = "<?php echo Yii::app()->createUrl('/consultant/order/index/search/')?>/"+jQuery(this).val();
    return false;
  }
});
 

</script>

