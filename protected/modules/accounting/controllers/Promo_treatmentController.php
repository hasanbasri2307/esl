<?php

class Promo_treatmentController extends RController
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
                $model = $this->loadModel($id);
                $treatment= PromoTreatment::model()->findAll(array("condition"=>"promo_id=$id"));
		$this->render('view',array(
			'model'=>$model,'treatment'=>$treatment
		));
	}

	
	public function actionCreate()
	{
		$model=new Promo;

		

		if(isset($_POST['Promo']))
		{
			$model->attributes=$_POST['Promo'];
                        $model->division = "esc";
                        $model->type = "treatment";
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->created =$time;
                       $model->date_start =  AccountingModule::format_date($model->date_start);
                        $model->date_end =  AccountingModule::format_date($model->date_end);
			if($model->save()){
                            if(isset($_POST['TreatmentId'])){
                                foreach ($_POST['TreatmentId'] as $key=>$val){
                                    $model_treatment= new PromoTreatment();
                                    $model_treatment->promo_id = $model->promo_id;
                                    $model_treatment->treatment_id = $val;
                                    $model_treatment->quantity = $_POST["TreatmentQuantity"][$key];
                                    $model_treatment->save();
                                }
                            }
                            $this->redirect(array('view','id'=>$model->promo_id));
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$model_treatment= PromoTreatment::model()->findAll(array("condition"=>"promo_id=$id"));

		if(isset($_POST['Promo']))
		{   
                    
			$model->attributes=$_POST['Promo'];
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->date_start =  AccountingModule::format_date($model->date_start);
                        $model->date_end =  AccountingModule::format_date($model->date_end);
                        
			if($model->save()){
				$this->redirect(array('view','id'=>$model->promo_id));
                        }else{
                           
                        }
		}

		$this->render('update',array(
			'model'=>$model,
                        'model_treatment'=>$model_treatment
		));
	}

	
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionIndex($search=NULL)
	{
		
                $criteria = new CDbCriteria;
                $criteria->condition = "type = 'treatment'";
                if(isset($search)) 
                    $criteria->condition = "AND  LOWER(`promo_number`) LIKE LOWER('%$search%') OR LOWER(`promo_number`) LIKE LOWER('%$search%') OR LOWER(`name`) LIKE LOWER('%$search%') OR LOWER(`name`) LIKE LOWER('%$search%')";
                
		$dataProvider=new CActiveDataProvider('Promo', array(
                    
                    'criteria'=>$criteria,
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
                $this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	public function loadModel($id)
	{
		$model=Promo::model()->find(array("condition"=>"promo_id=$id AND type='treatment'"));
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='treatmentpackage-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
          
}
