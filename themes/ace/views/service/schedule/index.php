<?php

/* @var $this DefaultController */

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
        if($val->duration>1){
            for($i=1;$i<$val->duration;$i++){
                 $unix_time = strtotime($val->date." ".$val->time) + ($i*3600);
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
                                        
                                        $jam = $i;
                                        $jam2 = ($i+1);
                                        if($i<10){
                                            $jam = '0'.$i.':00';
                                        }else{
                                             $jam = $i.':00';
                                        }
                                        if($jam2<10){
                                            $jam2 = '0'.($i+1).':00';
                                        }else{
                                            $jam2 = ($i+1).':00';
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
                                
                                ?>
                                
                        </tbody>
                </table>
		
    </ul>
                  
 
 
    </div>
</div>
 
<script type="text/javascript">
                            $(".client_name").on(ace.click_event, function() {
					bootbox.prompt("What is your name?", function(result) {
						if (result === null) {
							//Example.show("Prompt dismissed");
						} else {
							//Example.show("Hi <b>"+result+"</b>");
						}
					});
				});


 

</script>
