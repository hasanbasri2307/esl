<?php

$this->breadcrumbs=array(
	'Client',
);
$this->renderPartial('../menu',array(
			'active'=>array('3'=>true,),
		));
$tomorrow = date('Y-m-d',strtotime($date['str'] . "+1 days"));
$yesterday = date('Y-m-d',strtotime($date['str'] . "-1 days"));
if($model){
    foreach($model as $row=>$val){
        $schedule['name'][$val->date][$val->time][$val->room_id] =$val->client->client_name;
        $schedule['status'][$val->date][$val->time][$val->room_id] =$val->status;
        $duration_hour = explode(":",$val->duration);
        $duration = $duration_hour[0] * 3600 + $duration_hour[1] * 60 + $duration_hour[2];
        if($duration>1){
            for($i=0;$i<$duration; $i =$i+1800){
                 
                 $unix_time = strtotime($val->date." ".$val->time) + $i;
                 $hour = date("H:i:s", $unix_time);  
                 $schedule['name'][$val->date][$hour][$val->room_id] = $val->client->client_name;
                 $schedule['status'][$val->date][$hour][$val->room_id] = $val->status;
                
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
                                        <th>ROOM 1<br>TREATMENT NAME</th>
                                        <th>ROOM 2<br>TREATMENT NAME</th>
                                        <th>ROOM 3<br>TREATMENT NAME</th>
                                        <th>ROOM 4<br>TREATMENT NAME</th>
                                        <th>ROOM 5<br>TREATMENT NAME</th>
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
                                              if(isset($schedule['name'][$date['str']][$jam.":00"][1])){
                                                  echo '<td class="client_name status_color_'.$schedule['status'][$date['str']][$jam.":00"][1].'">'.$schedule['name'][$date['str']][$jam.":00"][1].'</td>';
                                              }else{
                                                  echo '<td></td>';
                                              }

                                             //room 2
                                            if(isset($schedule['name'][$date['str']][$jam.":00"][2])){
                                                  echo '<td class="client_name status_color_'.$schedule['status'][$date['str']][$jam.":00"][2].'">'.$schedule['name'][$date['str']][$jam.":00"][2].'</td>';
                                              }else{
                                                   echo '<td></td>';
                                              }
                                             //room 3
                                            if(isset($schedule['name'][$date['str']][$jam.":00"][3])){
                                                  echo '<td class="client_name status_color_'.$schedule['status'][$date['str']][$jam.":00"][3].'">'.$schedule['name'][$date['str']][$jam.":00"][3].'</td>';
                                              }else{
                                                  echo '<td></td>';
                                              }
                                             //room 4
                                            if(isset($schedule['name'][$date['str']][$jam.":00"][4])){
                                                  echo '<td class="client_name status_color_'.$schedule['status'][$date['str']][$jam.":00"][4].'">'.$schedule['name'][$date['str']][$jam.":00"][3].'</td>';
                                              }else{
                                                   echo '<td></td>';
                                              }
                                             //room 5
                                                if(isset($schedule['name'][$date['str']][$jam.":00"][5])){
                                                  echo '<td class="client_name status_color_'.$schedule['status'][$date['str']][$jam.":00"][5].'">'.$schedule['name'][$date['str']][$jam.":00"][5].'</td>';
                                              }else{
                                                   echo '<td></td>';
                                              }
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
 $script = ' $(".client_name").click(function(){
        bootbox.prompt(" ", function(result) {
						if (result === null) {
							 
						} else {
							  
						}
					});
        
    });
                    ';
  Yii::app()->clientScript->registerScript('popup',$script, CClientScript::POS_END);
 ?>

<script>
   
              