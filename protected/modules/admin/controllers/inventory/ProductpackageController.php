<?php

class ProductpackageController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public function filters()
	{
		 return array( 
                    'rights', 
                     array('ext.activityLog.QLogFilter','logCategory'=>'Backend','logLevel'=>'action'),
             ); 
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		
		$model = $this->loadModel($id);
        $model_product = ProductpackageDetail::model()->findAll(array("condition"=>"productpackage_id=$id"));
		$this->render('view',array(
			'model'=>$model,
            'model_product'=>$model_product,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Productpackage('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Productpackage']))
		{
			$model->attributes=$_POST['Productpackage'];
			$time = time();
            $model->user_id =Yii::app()->getModule('user')->user()->id;
            $model->changed =$time;
            $model->created =$time;
			$model->productpackage_number =Yii::app()->getModule('inventory')->autoNumber("PP","productpackage_number","esc_productpackage");
			if($model->save())
			{
				if(isset($_POST['ProductId'])){
									
                  	foreach ($_POST['ProductId'] as $key=>$val)
					{
                         //check product sudah ada atau belum
                         $product_detail = new ProductpackageDetail();
                         $product_detail->productpackage_id = $model->productpackage_id;
                         $product_detail->product_id = $val;
                         $product_detail->quantity = $_POST["ProductQuantity"][$key];
                         $product_detail->save();
                                        
										
                     }
                }
				
				$this->redirect(array('view','id'=>$model->productpackage_id));
			}
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
		$model->scenario = 'create';
		$model_product = ProductpackageDetail::model()->findAll(array("condition"=>"productpackage_id=$id"));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Productpackage']))
		{
			$model->attributes=$_POST['Productpackage'];
			if($model->save())
			{
				if(isset($_POST['ProductId'])){
									
                  	foreach ($_POST['ProductId'] as $key=>$val)
					{
						
                         //check product sudah ada atau belum
						
						 if(isset($_POST['p_id'][$key]))
						 {
							 
							 $cek  = ProductpackageDetail::model()->findAll(array("condition"=>"productpackage_id=".$_POST['p_id'][$key]." and product_id=$val"));
							 if(count($cek) > 0)
							 {
								 
								 $product_detail = ProductpackageDetail::model()->findByPk($_POST["id"][$key]);
								 $product_detail->product_id = $val;
								 $product_detail->quantity = $_POST["ProductQuantity"][$key];
								 $product_detail->save();
							 }
						 }
						 else
						 {
							 $product_detail = new ProductpackageDetail();
							 $product_detail->productpackage_id = $model->productpackage_id;
							 $product_detail->product_id = $val;
							 $product_detail->quantity = $_POST["ProductQuantity"][$key];
							 $product_detail->save();
						 }
						 
                                        
								
                     }
                }
				$this->redirect(array('view','id'=>$model->productpackage_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'model_product'=>$model_product,
		));
	}
	
	public function actionDeleteItem()
	{
		$id = $_POST['id'];
		$product = ProductpackageDetail::model()->findByPk($id);
		$product->delete();
		echo $id;
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		
		$this->loadModel($id)->delete();
		$model_product = ProductpackageDetail::model()->findAll(array("condition"=>"productpackage_id=$id"));
		foreach($model_product as $val)
		{
			$val->delete();
		}
		
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
               // $criteria->condition = "type = 'homecare'";
                if(isset($search)) 
                    $criteria->condition = "LOWER(`productpackage_number`) LIKE LOWER('%$search%') OR LOWER(`productpackage_number`) LIKE LOWER('%$search%') OR LOWER(`productpackage_name`) LIKE LOWER('%$search%') OR LOWER(`productpackage_name`) LIKE LOWER('%$search%')";
		$dataProvider=new CActiveDataProvider('Productpackage', array(
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
		$model=new Productpackage('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Productpackage']))
			$model->attributes=$_GET['Productpackage'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Productpackage the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Productpackage::model()->findByPk($id);
		
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Productpackage $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='productpackage-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	
	
	
}
