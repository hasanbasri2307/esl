<?php

class ClientController extends RController
{
        
        public function filters()
	{
		 return array( 
                    'rights', 
                     array('ext.activityLog.QLogFilter','logCategory'=>'Backend','logLevel'=>'action'),
             ); 
	}

	public function allowedActions() 
        { 
            return ''; 
        } 
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}


	/**
	 * Lists all models.
	 */
	public function actionIndex($search=NULL)
	{
		$criteria=new CDbCriteria();
		$branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
        $criteria->condition ="branch_id=$branch_id ";
        if(isset($search)) 
            $criteria->condition = "branch_id=$branch_id  AND  LOWER(`client_number`) LIKE LOWER('%$search%') OR LOWER(`client_number`) LIKE LOWER('%$search%') OR LOWER(`client_name`) LIKE LOWER('%$search%') OR LOWER(`client_middle_name`) LIKE LOWER('%$search%') OR LOWER(`client_last_name`) LIKE LOWER('%$search%')";
		$count=Client::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=18;
    	$pages->applyLimit($criteria);
		$client = Client::model()->findAll($criteria);

		$this->render('index',array(
			'client'=>$client,
			'pages' => $pages
		));
                
		
	}

	public function actionClientNew($search=NULL)
	{
		$criteria=new CDbCriteria();
		$branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
        $criteria->condition ="branch_id=$branch_id and status =0 ";
        if(isset($search)) 
             $criteria->condition = "branch_id=$branch_id  AND  LOWER(`client_number`) LIKE LOWER('%$search%') OR LOWER(`client_number`) LIKE LOWER('%$search%') OR LOWER(`client_name`) LIKE LOWER('%$search%') OR LOWER(`client_name`) LIKE LOWER('%$search%')";
		$count=Client::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=18;
    	$pages->applyLimit($criteria);
		$client = Client::model()->findAll($criteria);

		$this->render('clientnew',array(
			'client'=>$client,
			'pages' => $pages
		));
	}

	public function actionUpdate($id)
	{
		
		$model=$this->loadModel($id);
		
		$model->scenario='create';
		
		$model_ch=ClientHistory::model()->findByAttributes(array('client_id'=>$model->client_id));
		$model_ch->scenario='create';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']) && isset($_POST['ClientHistory']))
		{
			$time = time();
			$model->attributes=$_POST['Client'];
			  $model_ch->attributes=$_POST['ClientHistory'];
              
                        $model_ch->changed =$time;
                        $model->client_name = $_POST['first_name'].' '.$_POST['middle_name'].' '.$_POST['last_name'];
                        $model->status= $_POST['Client']['status'];
                        
			if(isset($_POST['Client']['filename']))
				$model->pict = $_POST['Client']['filename'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->client_id));
		}

		$this->render('update',array(
			'model'=>$model,
			'model_ch'=>$model_ch,
		));
	}

	 
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Client the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Client::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Client $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
     
}
