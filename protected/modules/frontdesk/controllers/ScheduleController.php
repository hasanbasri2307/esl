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
		
                   $id = $_POST['id'];
                    $sc = ScheduleRoom::model()->with('client')->findByPk($id);

                    
                
                   
            echo CJSON::encode($sc);   
	}

	
}
