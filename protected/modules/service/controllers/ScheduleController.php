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
                if(Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id')==1){
                    $branch_id = 3;
                }else{
                     $branch_id = Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');  
                    
                }
                $model = ScheduleRoom::model()->findAll(array('condition'=>'branch_id=:branch_id','params'=>array(':branch_id'=>$branch_id)));
                $this->render('index',array(
			'model'=>$model,
                        'date'=>$date_array,
		));
	}

	
}
