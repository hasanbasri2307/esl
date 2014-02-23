<?php

$this->breadcrumbs=array(
	'Reservation',
);
$this->renderPartial('../menu',array(
			'active'=>array('3'=>true,'3.2'=>true),
		));
$tomorrow = date('Y-m-d',strtotime($date['str'] . "+1 days"));
$yesterday = date('Y-m-d',strtotime($date['str'] . "-1 days"));
if($model){
    foreach($model as $row=>$val){
        $schedule['name'][$val->date][$val->time][$val->room_id] =$val->client['client_name'];
        $schedule['status'][$val->date][$val->time][$val->room_id] =$val->status;
		$schedule['id_sr'][$val->date][$val->time][$val->room_id] =$val->schedule_room_id;
        $duration_hour = explode(":",$val->duration);
        $duration = $duration_hour[0] * 3600 + $duration_hour[1] * 60 + $duration_hour[2];
        if($duration>1){
            for($i=0;$i<$duration; $i =$i+1800){
                 
                 $unix_time = strtotime($val->date." ".$val->time) + $i;
                 $hour = date("H:i:s", $unix_time);  
                 $schedule['name'][$val->date][$hour][$val->room_id] = $val->client['client_name'];
                 $schedule['status'][$val->date][$hour][$val->room_id] = $val->status;
				 $schedule['id_sr'][$val->date][$hour][$val->room_id] =$val->schedule_room_id;
                
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
                                                  echo '<td class="client_name" id ="'.$schedule['id_sr'][$date['str']][$jam.":00"][$item->room_id].'">'.$schedule['name'][$date['str']][$jam.":00"][$item->room_id].'</td>';
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
 <?php
 $quotedUrl =$this->createUrl('/frontdesk/schedule/data_client');
 $script = ' $("#sample-table-1 tr td").click(function(){
	 		var id = $(this).attr("id");
			
	 		$.ajax({
			type:"POST",
			url:"'.$quotedUrl.'",
			cache:false,
			data:"id="+ id ,
			dataType:"json",
			success:function(data){
				
       			 bootbox.alert("<table><tr><td>Client Name</td><td>:</td><td>Test</td></tr><tr><td>Date</td><td>:</td><td>"+data.date+"</td></tr></table>" 
				 );
			}
		});
		
        
    });
                    ';
  Yii::app()->clientScript->registerScript('popup',$script, CClientScript::POS_END);
 ?>

<script>
   
              