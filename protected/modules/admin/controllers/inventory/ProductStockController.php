<?php

class ProductStockController extends RController
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
		$model=new ProductStock;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductStock']))
		{
			$model->attributes=$_POST['ProductStock'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->product__stock_id));
		}

		$this->render('createStock',array(
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

		if(isset($_POST['ProductStock']))
		{
			$model->attributes=$_POST['ProductStock'];
			$time = time();
            $model->branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
            $model->changed =$time;
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

										Stock Berhasil Dibuat
										<br>
									</div>');
				
				$this->redirect(array('view','id'=>$model->product__stock_id));
			}
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
				$branch =  Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
                $criteria = new CDbCriteria;
                $criteria->with = array("product"=>array("select"=>"*")); 
				$criteria->together = true; // ADDED THIS
                $criteria->condition = 'branch_id=:id';
				$criteria->params = array(':id'=>$branch);
               // $criteria->condition = "type = 'homecare'";
                if(isset($search)) 
                    $criteria->condition = "branch_id=:id AND LOWER(`product_number`) LIKE LOWER('%$search%') OR LOWER(`product_number`) LIKE LOWER('%$search%') OR LOWER(`product_name`) LIKE LOWER('%$search%') OR LOWER(`product_name`) LIKE LOWER('%$search%')";
					$criteria->params = array(':id'=>$branch);
		$dataProvider=new CActiveDataProvider('ProductStock', array(
                    'criteria'=>$criteria,
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
                $this->render('stock',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductStock('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductStock']))
			$model->attributes=$_GET['ProductStock'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProductStock the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProductStock::model()->with('product')->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProductStock $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-stock-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
