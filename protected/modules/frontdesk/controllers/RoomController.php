<?php

class RoomController extends RController
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
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Room;
                $room_treatment= new RoomTreatment;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Room']))
		{
			$model->attributes=$_POST['Room'];
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->changed =$time;
                        $model->created =$time;
			if($model->save()){
                           if(isset($_POST['RoomTreatment']['treatment_id'])){
                                foreach ($_POST['RoomTreatment']['treatment_id'] as $key=>$val){
                                    $room_treatment= new RoomTreatment;
                                    $room_treatment->room_id = $model->room_id;
                                    $room_treatment->treatment_id = $val;
                                     $room_treatment->save();
                                }
                            }
                            $this->redirect(array('view','id'=>$model->room_id));
                        }
				
		}

		$this->render('create',array(
			'model'=>$model,'room_treatment'=>$room_treatment
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
                $room_treatment= new RoomTreatment;
                //$room_treatment= RoomTreatment::model()->findAll(array("condition"=>"room_id=$id"));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Room']))
		{
			$model->attributes=$_POST['Room'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->room_id));
		}

		$this->render('update',array(
			'model'=>$model,'room_treatment'=>$room_treatment
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
                    $criteria->condition = " LOWER(`room_number`) LIKE LOWER('%$search%') OR LOWER(`room_number`) LIKE LOWER('%$search%') OR LOWER(`room_name`) LIKE LOWER('%$search%') OR LOWER(`room_name`) LIKE LOWER('%$search%')";
                $sort = new CSort;
                $sort->defaultOrder = array(
                  'room_number'=>CSort::SORT_DESC,

                );
		
		$dataProvider=new CActiveDataProvider('Room', array(
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
		$model=new Room('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Room']))
			$model->attributes=$_GET['Room'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Room the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Room::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Room $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='room-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
