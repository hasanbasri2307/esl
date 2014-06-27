<?php

class FaceProfileController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array( 
                    'rights', 
                    array('ext.activityLog.QLogFilter','logCategory'=>'Backend','logLevel'=>'action'),
             ); 
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
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
		$model=new FaceProfile;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['FaceProfile']))
		{
			$model->attributes=$_POST['FaceProfile'];
			$model->user_id =Yii::app()->getModule('user')->user()->id;
                       
            $model->skintexture_grade = $_POST['skintexture_grade'];
            $model->skintexture_level = $_POST['skintexture_level'];
            $model->pigmentation_grade = $_POST['pigmentation_grade'];
             $model->pigmentation_level = $_POST['pigmentation_level'];
             $model->sebum_level = $_POST['sebum_level'];
            $model->sebum_grade = $_POST['sebum_grade'];
            $model->skintone_grade = $_POST['skintone_grade'];
            $model->skintone_level = $_POST['skintone_level'];
            $model->pores_grade = $_POST['pores_grade'];
  			$model->pores_level = $_POST['pores_level'];
  			$model->eyewrinkles_grade = $_POST['eyewrinkles_grade'];
  			$model->eyewrinkles_level = $_POST['eyewrinkles_level'];
  			$model->level_skin_type = $_POST['skin_type'];
  			$model->level_skin_problem = $_POST['skin_problem'];

  			 $model2=Client::model()->findByPk($_POST['FaceProfile']['client_id']);
                      	$model2->face_profile =1;
                      	$model2->save();

			if($model->save())
				Yii::app()->user->setFlash('alert','<div class="alert alert-success">
														<button type="button" class="close" data-dismiss="alert">
															<i class="icon-remove"></i>
														</button>
				
														<strong>
															<i class="icon-remove"></i>
															Success !!
														</strong>
				
														Face Profile berhasil dibuat
														<br>
													</div>');
				$this->redirect('create');
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

		if(isset($_POST['FaceProfile']))
		{
			$model->attributes=$_POST['FaceProfile'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->faceprofile_id));
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('FaceProfile');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new FaceProfile('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['FaceProfile']))
			$model->attributes=$_GET['FaceProfile'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return FaceProfile the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=FaceProfile::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param FaceProfile $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='face-profile-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
