<?php

$this->breadcrumbs=array(
	'Reservation',
);
$this->renderPartial('../menu',array(
			'active'=>array('4'=>true,'4.2'=>true),
		));
$tomorrow = date('Y-m-d',strtotime($date['str'] . "+1 days"));
$yesterday = date('Y-m-d',strtotime($date['str'] . "-1 days"));
if($model){
    foreach($model as $row=>$val){
        $schedule['name'][$val->date_t][$val->time_t][$val->room_id] =$val->client['client_name'];
        $schedule['status'][$val->date_t][$val->time_t][$val->room_id] =$val->status;
		$schedule['id_sr'][$val->date_t][$val->time_t][$val->room_id] =$val->schedule_room_id;
        $duration_hour = explode(":",$val->duration);
        $duration = $duration_hour[0] * 3600 + $duration_hour[1] * 60 + $duration_hour[2];
        if($duration>1){
            for($i=0;$i<$duration; $i =$i+1800){
                 
                 $unix_time = strtotime($val->date_t." ".$val->time_t) + $i;
                 $hour = date("H:i:s", $unix_time);  
                 $schedule['name'][$val->date_t][$hour][$val->room_id] = $val->client['client_name'];
                 $schedule['status'][$val->date_t][$hour][$val->room_id] = $val->status;
				 $schedule['id_sr'][$val->date_t][$hour][$val->room_id] =$val->schedule_room_id;
                
            }
        }
		
    }
    
}

?>

<div class="page-header position-relative">
    <h1>            Room Schedule
            <small>
                    <i class="icon-double-angle-right"></i>
                   
            </small>
    </h1>
</div>
    
 <div class="row-fluid">
<?php if(Yii::app()->user->hasFlash('alert')): ?>
	<?php echo Yii::app()->user->getFlash('alert'); ?>
<?php endif; ?>
	<div class="span12">
          <ul class="pager">
            <li class="previous">
                    
                    <?php echo CHtml::link("← Prev",array('schedule/index',"date"=>$yesterday)); ?>
            </li>
            <li class=""><strong><?php echo date("F d, Y",$date['time']);?></strong></li>
            <li class="next">
                    
                     <?php echo CHtml::link("Next →",array('schedule/index',"date"=>$tomorrow)); ?>
            </li>
            
            	<table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>
                                <tr>
                                        <th>Time</th>
                                        <?php foreach($room as $item) { ?>
                                        <th><?php echo $item->room_number;?><br><?php $rt= RoomTreatment::model()->with('room')->findAll(array('condition'=>'room.branch_id=:branch_id and room.room_id=:room_id','params'=>array(':branch_id'=>$branch_id,':room_id'=>$item->room_id))); foreach($rt as $vall) { echo $vall->treatment->treatment_name.', ';}}?></th>
                                        
                                </tr>
                        </thead>

                        <tbody>
                                <?php
								
                                    for($i=8;$i<20;$i++){
                                        for ($j = 0; $j <= 1; $j++) {
                                            if($j==1){
                                                $menit = "30";
                                                 $menit2="00";
                                            }else{
                                                $menit="00";
                                                $menit2 ="30";
                                            }
                                            $jam = $i;
                                            $jam2 = ($i+1);
                                            if($i<10){
                                                $jam = '0'.$i.':'.$menit;
                                            }else{
                                                 $jam = $i.':'.$menit;
                                            }
                                            if($jam2<10){
                                                $jam2 = '0'.($i+1).':'.$menit2;
                                            }else{
                                                $jam2 = ($i+1).':'.$menit2;
                                            }
                                            echo '<tr>';
                                            echo '<td>'.$jam .'- '.$jam2.'</td>';
                                            //room 1
                                              //$time = strtotime($date['str'].$jam);
											  
											  foreach($room as $item) { 
                                              
                                             //room 5
                                                if(isset($schedule['name'][$date['str']][$jam.":00"][$item->room_id])){
                                                  ?> <td  class="client_name" id ="<?php echo $schedule['id_sr'][$date['str']][$jam.":00"][$item->room_id];?>"><?php if($schedule['status'][$date['str']][$jam.":00"][$item->room_id]==1) { echo $schedule['name'][$date['str']][$jam.":00"][$item->room_id].'&nbsp '; $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'warning', 
    'label'=>'Not Confirm',
));} else if($schedule['status'][$date['str']][$jam.":00"][$item->room_id]==2) {echo $schedule['name'][$date['str']][$jam.":00"][$item->room_id].'&nbsp '; $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'important', 
    'label'=>'Cancel',
));} else if($schedule['status'][$date['str']][$jam.":00"][$item->room_id]==3) {echo $schedule['name'][$date['str']][$jam.":00"][$item->room_id].'&nbsp '; $this->widget('bootstrap.widgets.TbLabel', array(
    'type'=>'success', 
    'label'=>'Confirmed',
));} ?></td><?php
                                              }else{
                                                   echo '<td></td>';
                                              }}
                                              echo '</tr>';  
											  
                                         }
										 
                                    }
                                
                                ?>
                                
                        </tbody>
                </table>
		
    </ul>
                  
 
 
    </div>
</div>
<?php $this->beginWidget('bootstrap.widgets.TbModal', array('id'=>'myModal')); ?>

<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Client Information</h4>
</div>
 
<div class="modal-body">
    
    	<div id="modal-body-1">
        
        </div>
    	<input type="hidden" name="schedule_room_id" id="schedule_room_id">
</div>
 
<div class="modal-footer">
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'primary',
        'label'=>'Confirm',
        'url'=>'#',
        'htmlOptions'=>array('id'=>'confirm'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Reschedule',
        'url'=>'#',
        'htmlOptions'=>array('id'=>'reschedule'),
    )); ?>
    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'label'=>'Cancel',
        'url'=>'#',
        'htmlOptions'=>array('id'=>'cancel'),
    )); ?>
</div>
 
<?php $this->endWidget(); ?>


 <?php
 $quotedUrl =$this->createUrl('/consultant/schedule/data_client');
 $script = ' $("#sample-table-1 tr td").click(function(){
	 		var id = $(this).attr("id");
			
			$("#myModal").modal({
					show: "true"
				}); 
	 		$.ajax({
			type:"POST",
			url:"'.$quotedUrl.'",
			cache:false,
			data:"id="+ id ,
			dataType:"json",
			success:function(data){
			
       		 
				
			  
       		 $("#modal-body-1").html("<table><tr><td>Client ID</td><td>:</td><td>"+data[0].client_number+"</td></tr><tr><td>Client Name</td><td>:</td><td>"+data[0].client_name+"</td></tr><tr><td>Date</td><td>:</td><td>"+data[0].date_t+"</td></tr><tr><td>Start</td><td>:</td><td>"+data[0].time_t+"</td></tr><tr><td>Finish</td><td>:</td><td>"+data[0].selesai+"</td></tr><tr><td>Duration</td><td>:</td><td>"+data[0].duration+"</td></tr></table>");
			 
			$("#schedule_room_id").val(data[0].schedule_room_id);
			}
		});
		
        
    });
                    ';
  Yii::app()->clientScript->registerScript('popup',$script, CClientScript::POS_END);
  
  $url1 =$this->createUrl('/consultant/schedule/confirmation');
 $script2 = ' $("#confirm").click(function(){
	 		var id = $("#schedule_room_id").val();
			
			$.ajax({
			type:"POST",
			url:"'.$url1.'",
			cache:false,
			data:"id="+ id ,
			success:function(){
				$("#myModal").modal("hide");
				location.reload();
			},
			error:function (xhr, ajaxOptions, thrownError){
        alert("Error Status: " + xhr.status + " Thrown Errors: "+thrownError);
    }
		 });
        
    });
                    ';
  Yii::app()->clientScript->registerScript('confirmModal',$script2, CClientScript::POS_END);
  
  $url2 =$this->createUrl('/consultant/schedule/cancel');
 $script3 = ' $("#cancel").click(function(){
	 		var id = $("#schedule_room_id").val();
			
			$.ajax({
			type:"POST",
			url:"'.$url2.'",
			cache:false,
			data:"id="+ id ,
			success:function(){
				$("#myModal").modal("hide");
				location.reload();
			},
			error:function (xhr, ajaxOptions, thrownError){
        alert("Error Status: " + xhr.status + " Thrown Errors: "+thrownError);
    }
		 });
        
    });
                    ';
  Yii::app()->clientScript->registerScript('cancelModal',$script3, CClientScript::POS_END);
  
   
 $script4 = ' $("#reschedule").click(function(){
	 		var id = $("#schedule_room_id").val();
			
			window.location  = "'.Yii::app()->createUrl('/consultant/schedule/update/id/"+id+"').'";
        
    });
                    ';
  Yii::app()->clientScript->registerScript('rescheduleModal',$script4, CClientScript::POS_END);
  
 ?>


   
              