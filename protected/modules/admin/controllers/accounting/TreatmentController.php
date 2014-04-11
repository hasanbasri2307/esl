<?php

class TreatmentController extends RController
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
            return 'autocomplete_number, autocomplete_name, actionSort'; 
        } 
	public function actionView($id)
	{
		
                $model = $this->loadModel($id);
                $procedure = Procedure::model()->findByPk($id);
                $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
        public function actionSort()
        {
            if (isset($_POST['items']) && is_array($_POST['items'])) {
                $i = 0;
                foreach ($_POST['items'] as $item) {
                    $project = Project::model()->findByPk($item);
                    $project->sortOrder = $i;
                    $project->save();
                    $i++;
                }
            }
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
		$model->scenario = 'accounting';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Treatment']))
		{
			$model->attributes=$_POST['Treatment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->treatment_id));
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
                    $criteria->condition = " LOWER(`treatment_number`) LIKE LOWER('%$search%') OR LOWER(`treatment_number`) LIKE LOWER('%$search%') OR LOWER(`treatment_name`) LIKE LOWER('%$search%') OR LOWER(`treatment_name`) LIKE LOWER('%$search%')";
                $sort = new CSort;
                $sort->defaultOrder = array(
                  'treatment_number'=>CSort::SORT_ASC,

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
        public function actionProduct($id)
      {
                $model=$this->loadModel($id);
                $model_product  = TreatmentProduct::model()->findAll(array('condition'=>'treatment_id=:treatment_id','params'=>array(':treatment_id'=>$id)));
		if(isset($_POST['ProductId'])){
                         foreach($model_product as $row=>$val){
                             $product[$val->product_id] = $val->treatment_product_id;
                             if (in_array($val->product_id, $_POST['ProductId'])) {
                                    
                             }else{
                                 if(isset($q_delete)){
                                     $q_delete = " OR  id= $val->product_id";
                                 }else{
                                     $q_delete = "product_id = $val->product_id";
                                      
                                 }
                                    
                             }
                         }
                        
                          if(isset($q_delete)){
                              TreatmentProduct::model()->deleteAll("treatment_id=$id AND ($q_delete)");
                          }
                         foreach ($_POST['ProductId'] as $key=>$val){
                            //add if dont exist
                            if(isset($product[$val])){
                               
                            }else{
                               
                                 $treatment_product = new TreatmentProduct();
                                 $treatment_product->treatment_id = $id;
                                 $treatment_product->product_id = $val;
                                 $treatment_product->quantity = $_POST["ProductQuantity"][$key];
                                 $treatment_product->save();
                            }
                            
                        }
                        $this->redirect(array('treatment/view','id'=>$model->treatment_id));
                }
		$this->render('product',array(
			'model'=>$model,
                        'model_product'=>$model_product,
		));
       }
        public function actionProcedure($id)
      {
                $model=$this->loadModel($id);
               
                
                $procedure=new CActiveDataProvider('TreatmentProcedure', array(
                    'criteria'=>array('condition'=>'treatment_id=:treatment_id','params'=>array(':treatment_id'=>$id)),
                    'criteria'=>array(
                        'condition'=>'treatment_id=:treatment_id',
                        'params'=>array(':treatment_id'=>$id),
                    ),
                    'pagination'=>array(
                        'pageSize'=>20,
                    ),
                ));
                
                $model_procedure  = new TreatmentProcedure;
                if(isset($_POST['TreatmentProcedure']))
		{
			$model_procedure->attributes=$_POST['TreatmentProcedure'];
                        $time = time();
                        $model_procedure->treatment_id= $id;
                        $model_procedure->user_id =Yii::app()->getModule('user')->user()->id;
                        $model_procedure->changed =$time;
                        $model_procedure->created =$time;
                        $model_procedure->active =1;
			if($model_procedure->save()){
                            
                           $this->redirect(array('treatment/procedure','id'=>$model->treatment_id));
                        }
				
		}

		 
                         
                        
               
		$this->render('procedure',array(
			'model'=>$model,
                        'model_procedure'=>$model_procedure,
                        'procedure'=>$procedure,
		));
       }
      public function actionMachine($id)
      {
                $model=$this->loadModel($id);
                $model_machine  = TreatmentMachine::model()->findAll(array('condition'=>'treatment_id=:treatment_id','params'=>array(':treatment_id'=>$id)));
		if(isset($_POST['MachineId'])){
                         foreach($model_machine as $row=>$val){
                             $machine[$val->machine_id] = $val->treatment_machine_id;
                             if (in_array($val->machine_id, $_POST['MachineId'])) {
                                    
                             }else{
                                 if(isset($q_delete)){
                                     $q_delete = " OR  id= $val->machine_id";
                                 }else{
                                     $q_delete = "machine_id = $val->machine_id";
                                      
                                 }
                                    
                             }
                         }
                         
                          if(isset($q_delete)){
                              TreatmentMachine::model()->deleteAll("treatment_id=$id AND ($q_delete)");
                          }
                         foreach ($_POST['MachineId'] as $key=>$val){
                            //add if dont exist
                            if(isset($machine[$val])){
                            }else{
                                 $treatment_machine = new TreatmentMachine();
                                 $treatment_machine->treatment_id = $id;
                                 $treatment_machine->machine_id = $val;
                                 $treatment_machine->save();
                            }
                            
                        }
                        $this->redirect(array('treatment/view','id'=>$model->treatment_id));
                }
		$this->render('machine',array(
			'model'=>$model,
                        'model_machine'=>$model_machine,
		));
       }
	   
	   
}


 