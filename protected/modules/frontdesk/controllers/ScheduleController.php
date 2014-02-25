<?php

class ScheduleController extends RController
{
        
        public function filters()
	{
		 return array( 
                    'rights', 
             ); 
	}

	public function allowedActions() 
        { 
            return ''; 
        } 
	


	/**
	 * Lists all models.
	 */
	public function actionIndex($date=NULL)
	{
		if(isset($date)) {
                   $date_array['time'] = strtotime($date);
                   $date_array['str'] = $date;
                }else{
                    $date_array['time'] = time();
                    $date_array['str'] = date("Y-m-d",$date_array['time']);
                   
                }
                
                     $branch_id = Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');  
                    
                
                $model = ScheduleRoom::model()->findAll(array('condition'=>'branch_id=:branch_id','params'=>array(':branch_id'=>$branch_id)));
				$room = Room::model()->findAll(array('condition'=>'branch_id=:branch_id','params'=>array(':branch_id'=>$branch_id)));
                $this->render('index',array(
			'model'=>$model,
			'room' =>$room,
            'date'=>$date_array,
			'branch_id'=>$branch_id,
		));
	}
	
	public function actionData_client()
	{
		
         $id =$_POST['id'];
		 $sql = "select *, ADDTIME(s.time_t,s.duration) as selesai from esc_schedule_room s inner join esc_client c on s.client_id = c.client_id where s.schedule_room_id ='".$id."'";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$dataReader=$command->queryAll();
		echo CJSON::encode($dataReader);
           
	}
	
	public function actionConfirmation()
	{
		$id = $_POST['id'];
		 $sql = "update esc_schedule_room set status = 3 where schedule_room_id ='".$id."'";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$command->query();
	}
	
	public function actionCancel()
	{
		$id = $_POST['id'];
		$sql = "update esc_schedule_room set status = 2 where schedule_room_id ='".$id."'";
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$command->query();
	}
	
	public function actionUpdate($id)
	{
		$model=ScheduleRoom::model()->findByPk($id);
               
                //$room_treatment= RoomTreatment::model()->findAll(array("condition"=>"room_id=$id"));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['ScheduleRoom']))
		{
			$model->attributes=$_POST['ScheduleRoom'];
			$date = $model->date_t;
			$branch_id = $model->branch_id;
			$room_id = $model->room_id;
			$time = $model->time_t;
			$duration = $model->duration;
			$secs = strtotime("00:00:01")-strtotime("00:00:00");
			$result = date("H:i:s",strtotime($time)+$secs);
			$secs1 = strtotime($duration)-strtotime("00:00:00");
			$result1 = date("H:i:s",strtotime($time)+$secs);
			$model->end_time = $result1;
			
			$criteria = new CDbCriteria();
			$criteria->condition = " branch_id = :branch_id and room_id = :room_id and date_t = :date and CAST(:waktu AS TIME ) BETWEEN time_t AND end_time";
			$criteria->params = array(':waktu'=>$result,':branch_id'=>$branch_id,':room_id'=>$room_id,':date'=>$date);
			$count = ScheduleRoom::model()->count($criteria);
			if($count > 0)
			{
				Yii::app()->user->setFlash('alert','<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<strong>
											<i class="icon-remove"></i>
											Error !!
										</strong>

										Jadwal Bentrok
										<br>
									</div>');
					$this->redirect(array('Schedule/update/id/'.$model->schedule_room_id));			
			}
			else
			{
				
			
			if($model->save())
			{
				
				Yii::app()->user->setFlash('alert','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<strong>
											<i class="icon-remove"></i>
											Success !!
										</strong>

										Jadwal Berhasil Diubah
										<br>
									</div>');
				$this->redirect(array('schedule/index/date/'.$model->date_t));
			}}

		}

		$this->render('update',array(
			'model'=>$model
		));
	}
	
	
	public function actionCreate()
	{
		$model=new ScheduleRoom;
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ScheduleRoom']))
		{
			$model->attributes=$_POST['ScheduleRoom'];
                        $time = time();
                        $model->branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
						$model->user_id =Yii::app()->getModule('user')->user()->profile->getAttribute('user_id');
						$model->client_id =$_POST['client_id'];
                        $model->changed =$time;
                        $model->created =$time;
						$model->status = 1;
						$secs = strtotime("00:00:01")-strtotime("00:00:00");
						$result = date("H:i:s",strtotime($_POST['ScheduleRoom']['time_t'])+$secs);
						$secs1 = strtotime($_POST['ScheduleRoom']['duration'])-strtotime("00:00:00");
						$result1 = date("H:i:s",strtotime($_POST['ScheduleRoom']['time_t'])+$secs1);
						$model->end_time = $result1;
						
						$criteria = new CDbCriteria();
						$criteria->condition = " branch_id = :branch_id and room_id = :room_id and date_t = :date and CAST(:waktu AS TIME ) BETWEEN time_t AND end_time";
						$criteria->params = array(':waktu'=>$result,':branch_id'=>Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id'),':room_id'=>$_POST['ScheduleRoom']['room_id'],':date'=>$_POST['ScheduleRoom']['date_t']);
						$count = ScheduleRoom::model()->count($criteria);
						if($count > 0)
						{
							Yii::app()->user->setFlash('alert','<div class="alert alert-error">
													<button type="button" class="close" data-dismiss="alert">
														<i class="icon-remove"></i>
													</button>
			
													<strong>
														<i class="icon-remove"></i>
														Error !!
													</strong>
			
													Jadwal Bentrok
													<br>
												</div>');
								$this->redirect(array('Schedule/update/id/'.$model->schedule_room_id));			
						}
						else
						{
							
						
							if($model->save())
							{
								
								Yii::app()->user->setFlash('alert','<div class="alert alert-success">
														<button type="button" class="close" data-dismiss="alert">
															<i class="icon-remove"></i>
														</button>
				
														<strong>
															<i class="icon-remove"></i>
															Success !!
														</strong>
				
														Jadwal Berhasil Dibuat
														<br>
													</div>');
								$this->redirect(array('schedule/index/date/'.$model->date_t));
							}
						}
					
				
		}

		$this->render('create',array(
			'model'=>$model
		));
	}
	public function actionAutocomplete_name()
      {
         
            
               
                  if (Yii::app()->request->isAjaxRequest && isset($_GET['term'])) {
                    $search = strtolower($_GET["term"]);
                    $criteria = new CDbCriteria;
                    if(isset($search))   
                     $criteria->condition = " LOWER(`client_name`) LIKE LOWER('%$search%')";
                     $product = Client::model()->findAll($criteria);
                      foreach ($product as $row=>$val){
                         $output[] =  array("label"=>$val->client_name, "value"=>$val->client_id);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
              
        }

	
}
