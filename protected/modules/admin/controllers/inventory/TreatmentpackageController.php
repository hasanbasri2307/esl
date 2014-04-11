<?php

class TreatmentpackageController extends RController
{
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
        $model_treatment = TreatmentpackageDetail::model()->findAll(array("condition"=>"treatmentpackage_id=$id"));
		$this->render('view',array(
			'model'=>$model,
            'model_treatment'=>$model_treatment,
		));
	}

	

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Treatmentpackage('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Treatmentpackage']))
		{
			$model->attributes=$_POST['Treatmentpackage'];
			$time = time();
            $model->user_id =Yii::app()->getModule('user')->user()->id;
            $model->changed =$time;
            $model->created =$time;
			$model->treatmentpackage_number =Yii::app()->getModule('inventory')->autoNumber("TP","treatmentpackage_number","esc_treatmentpackage");
			if($model->save())
			{
				if(isset($_POST['TreatmentId'])){
									
                  	foreach ($_POST['TreatmentId'] as $key=>$val)
					{
                         //check product sudah ada atau belum
                         $product_detail = new TreatmentpackageDetail();
                         $product_detail->treatmentpackage_id = $model->treatmentpackage_id;
                         $product_detail->treatment_id = $val;
                         $product_detail->quantity = $_POST["TreatmentQuantity"][$key];
                         $product_detail->save();
                                        
										
                     }
                }
				
				$this->redirect(array('view','id'=>$model->treatmentpackage_id));
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
		$model_product = TreatmentpackageDetail::model()->findAll(array("condition"=>"treatmentpackage_id=$id"));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Treatmentpackage']))
		{
			$model->attributes=$_POST['Treatmentpackage'];
			if($model->save())
			{
				if(isset($_POST['TreatmentId'])){
									
                  	foreach ($_POST['TreatmentId'] as $key=>$val)
					{
						
                         //check product sudah ada atau belum
						
						 if(isset($_POST['t_id'][$key]))
						 {
							 
							 $cek  = TreatmentpackageDetail::model()->findAll(array("condition"=>"treatmentpackage_id=".$_POST['t_id'][$key]." and treatment_id=$val"));
							 if(count($cek) > 0)
							 {
								 
								 $product_detail = TreatmentpackageDetail::model()->findByPk($_POST["id"][$key]);
								 $product_detail->treatment_id = $val;
								 $product_detail->quantity = $_POST["TreatmentQuantity"][$key];
								 $product_detail->save();
							 }
						 }
						 else
						 {
							 $product_detail = new TreatmentpackageDetail();
							 $product_detail->treatmentpackage_id = $model->treatmentpackage_id;
							 $product_detail->treatment_id = $val;
							 $product_detail->quantity = $_POST["TreatmentQuantity"][$key];
							 $product_detail->save();
						 }
						 
                                        
								
                     }
                }
				$this->redirect(array('view','id'=>$model->treatmentpackage_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'model_treatment'=>$model_product,
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
		$model_product = TreatmentpackageDetail::model()->findAll(array("condition"=>"treatmentpackage_id=$id"));
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
                    $criteria->condition = "LOWER(`treatmentpackage_number`) LIKE LOWER('%$search%') OR LOWER(`treatmentpackage_number`) LIKE LOWER('%$search%') OR LOWER(`treatmentpackage_name`) LIKE LOWER('%$search%') OR LOWER(`treatmentpackage_name`) LIKE LOWER('%$search%')";
		$dataProvider=new CActiveDataProvider('Treatmentpackage', array(
                    'criteria'=>$criteria,
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
                $this->render('index',array(
			'dataProvider'=>$dataProvider,));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Treatmentpackage('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Treatmentpackage']))
			$model->attributes=$_GET['Treatmentpackage'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Treatmentpackage the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Treatmentpackage::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Treatmentpackage $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='treatmentpackage-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionDeleteItem()
	{
		$id = $_POST['id'];
		$product = TreatmentpackageDetail::model()->findByPk($id);
		$product->delete();
		echo $id;
	}
}
