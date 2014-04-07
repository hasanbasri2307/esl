<?php

class BranchController extends RController
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Branch;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Branch']))
		{
			$model->attributes=$_POST['Branch'];
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->created =$time;
			if($model->save())
				$this->redirect(array('view','id'=>$model->branch_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Branch']))
		{
			$model->attributes=$_POST['Branch'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->branch_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex($search=NULL)
	{
                $criteria = new CDbCriteria; 
                if(isset($search)) 
                    $criteria->condition = " LOWER(`branch_number`) LIKE LOWER('%$search%') OR LOWER(`branch_number`) LIKE LOWER('%$search%') OR LOWER(`branch_name`) LIKE LOWER('%$search%') OR LOWER(`branch_name`) LIKE LOWER('%$search%') OR LOWER(`address`) LIKE LOWER('%$search%') OR LOWER(`address`) LIKE LOWER('%$search%')";
           
                $sort = new CSort;
                $sort->defaultOrder = array(
                  'branch_number'=>CSort::SORT_DESC,

                );
		$sort = new CSort;
                $sort->defaultOrder = array(
                  'branch_number'=>CSort::SORT_DESC,
                );
                    $sort->attributes = array(
                    'branch_number'=>array(
                        'asc'=>'branch_number',
                        'desc'=>'branch_number desc',
                    ),
                    'branch_name'=>array(
                        'asc'=>'branch_name',
                        'desc'=>'branch_name desc',
                    ),
                   'address'=>array(
                        'asc'=>'address',
                        'desc'=>'address desc',
                    ),
                    'phone'=>array(
                        'asc'=>'phone',
                        'desc'=>'phone desc',
                    ),
                    'fax'=>array(
                        'asc'=>'fax',
                        'desc'=>'fax desc',
                    ),
                  );
		$dataProvider=new CActiveDataProvider('Branch', array(
                    'sort'=>$sort,
                    'criteria'=>$criteria,
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
                
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Branch('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Branch']))
			$model->attributes=$_GET['Branch'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Branch the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Branch::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Branch $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='branch-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
