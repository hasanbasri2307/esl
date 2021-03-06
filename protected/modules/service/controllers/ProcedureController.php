<?php

class ProcedureController extends RController
{
	
        
	public function filters()
	{
		 return array( 
                    'rights', 
             ); 
	}

	public function allowedActions() 
        { 
            return 'autocomplete_number, autocomplete_name'; 
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
		$model=new Treatment;
               
		if(isset($_POST['Treatment']))
		{
			$model->attributes=$_POST['Treatment'];
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->created =$time;
			if($model->save()){
                            
                            $this->redirect(array('view','id'=>$model->treatment_id));
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
                 $model_product = PromoProduct::model()->findAll(array("condition"=>"promo_id=$id"));
		
		if(isset($_POST['Treatment']))
		{
			$model->attributes=$_POST['Treatment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->treatment_id));
		}

		$this->render('update',array(
			'model'=>$model,
                    'model_product'=>$model_product,
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
                    $criteria->condition = " LOWER(`treatment_number`) LIKE LOWER('%$search%') OR LOWER(`treatment_number`) LIKE LOWER('%$search%') OR LOWER(`treatment_name`) LIKE LOWER('%$search%') OR LOWER(`treatment_name`) LIKE LOWER('%$search%')";
                $sort = new CSort;
                $sort->defaultOrder = array(
                  'treatment_number'=>CSort::SORT_DESC,

                );
		
		$dataProvider=new CActiveDataProvider('Treatment', array(
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
		$model=new Treatment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Treatment']))
			$model->attributes=$_GET['Treatment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Treatment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Treatment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Treatment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='treatment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionAutocomplete_number()
      {
         
            
               if (Yii::app()->request->isAjaxRequest && isset($_GET['term'])) {
                    $search = strtolower($_GET["term"]);
                    $criteria = new CDbCriteria;
                    if(isset($search))   
                     $criteria->condition = " LOWER(`treatment_number`) LIKE LOWER('%$search%')";
                     $treatment = Treatment::model()->findAll($criteria);
                      foreach ($treatment as $row=>$val){
                         $output[] =  array("label"=>$val->treatment_number, "value"=>$val->treatment_id,  "value2"=>$val->treatment_name);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
              
              
        }
         public function actionAutocomplete_name()
      {
         
            
               if (Yii::app()->request->isAjaxRequest && isset($_GET['term'])) {
                    $search = strtolower($_GET["term"]);
                    $criteria = new CDbCriteria;
                    if(isset($search))   
                     $criteria->condition = "LOWER(`treatment_name`) LIKE LOWER('%$search%')";
                     $treatment = Treatment::model()->findAll($criteria);
                      foreach ($treatment as $row=>$val){
                         $output[] =  array("label"=>$val->treatment_name, "value"=>$val->treatment_id,  "value2"=>$val->treatment_number);
                      }
                    
                }
                   
            echo CJSON::encode($output);   
              
              
        }
}
