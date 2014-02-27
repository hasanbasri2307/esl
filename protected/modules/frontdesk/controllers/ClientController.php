<?php

class ClientController extends RController
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
            $criteria->condition .= " AND  LOWER(`client_number`) LIKE LOWER('%$search%') OR LOWER(`client_number`) LIKE LOWER('%$search%') OR LOWER(`client_name`) LIKE LOWER('%$search%') OR LOWER(`client_name`) LIKE LOWER('%$search%')";
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
