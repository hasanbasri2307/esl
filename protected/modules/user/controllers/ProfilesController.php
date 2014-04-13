<?php

class ProfilesController extends RController
{

	
	
	private $_model;

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

	/**
	 * Manages all models.
	 */
	public function actionIndex($search=NULL)
	{
		
                 $criteria = new CDbCriteria; 
                if(isset($search)) 
                    $criteria->condition = " LOWER(`name`) LIKE LOWER('%$search%') OR LOWER(`name`) LIKE LOWER('%$search%')";
                $sort = new CSort;
                $sort->defaultOrder = array(
                  'name'=>CSort::SORT_ASC,

                );
		
		$dataProvider=new CActiveDataProvider('Profiles', array(
		
			'sort'=>$sort,
            'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));//*/
	}

	public function actionDoctor($search=NULL)
	{
		
                 $criteria = new CDbCriteria;
                 $criteria->condition='id_jabatan = 33 OR id_jabatan =38'; 
                if(isset($search)) 
                    $criteria->condition = " LOWER(`name`) LIKE LOWER('%$search%') OR LOWER(`name`) LIKE LOWER('%$search%')";
                $sort = new CSort;
                $sort->defaultOrder = array(
                  'name'=>CSort::SORT_ASC,

                );
		
		$dataProvider=new CActiveDataProvider('Profiles', array(
		
			'sort'=>$sort,
            'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('doctor',array(
			'dataProvider'=>$dataProvider,
		));//*/
	}

	public function actionNurse($search=NULL)
	{
		
                 $criteria = new CDbCriteria;
                 $criteria->condition='id_jabatan = 35 OR id_jabatan =36'; 
                if(isset($search)) 
                    $criteria->condition = " LOWER(`name`) LIKE LOWER('%$search%') OR LOWER(`name`) LIKE LOWER('%$search%')";
                $sort = new CSort;
                $sort->defaultOrder = array(
                  'name'=>CSort::SORT_ASC,

                );
		
		$dataProvider=new CActiveDataProvider('Profiles', array(
		
			'sort'=>$sort,
            'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('nurse',array(
			'dataProvider'=>$dataProvider,
		));//*/
	}

	public function actionBeautician($search=NULL)
	{
		
                 $criteria = new CDbCriteria;
                 $criteria->condition='id_jabatan = 39'; 
                if(isset($search)) 
                    $criteria->condition = " LOWER(`name`) LIKE LOWER('%$search%') OR LOWER(`name`) LIKE LOWER('%$search%')";
                $sort = new CSort;
                $sort->defaultOrder = array(
                  'name'=>CSort::SORT_ASC,

                );
		
		$dataProvider=new CActiveDataProvider('Profiles', array(
		
			'sort'=>$sort,
            'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('beautician',array(
			'dataProvider'=>$dataProvider,
		));//*/
	}

	public function actionTherapist($search=NULL)
	{
		
                 $criteria = new CDbCriteria;
                 $criteria->condition='id_jabatan = 34'; 
                if(isset($search)) 
                    $criteria->condition = " LOWER(`name`) LIKE LOWER('%$search%') OR LOWER(`name`) LIKE LOWER('%$search%')";
                $sort = new CSort;
                $sort->defaultOrder = array(
                  'name'=>CSort::SORT_ASC,

                );
		
		$dataProvider=new CActiveDataProvider('Profiles', array(
		
			'sort'=>$sort,
            'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('therapist',array(
			'dataProvider'=>$dataProvider,
		));//*/
	}


	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Profiles('create');
		
        
		
		if(isset($_POST['Profiles']))
		{
			$model->attributes=$_POST['Profiles'];
			
			
			
			if($model->validate()) {
				
				$model->save() ;
	
				$this->redirect(array('view','id'=>$model->user_id));
			} 
		}

		$this->render('create',array(
			'model'=>$model,
			
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$model->scenario = 'create';
		
		$this->performAjaxValidation(array($model));
		if(isset($_POST['Profiles']))
		{
			$model->attributes=$_POST['Profiles'];
			
			if($model->validate()) {
				
				$model->save();
				
				$this->redirect(array('view','id'=>$model->user_id));
			} 
		}

		$this->render('update',array(
			'model'=>$model,
			
		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel();
			$profile = Profiles::model()->findByPk($model->user_id);
			
			$model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('/user/profiles'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	/**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($validate)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
        {
            echo CActiveForm::validate($validate);
            Yii::app()->end();
        }
    }
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Profiles::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
	public function actionExcel()
	{
		$model=new Employee;
		if(isset($_POST['Employee']))
		{
			$model->attributes=$_POST['Employee'];
			$itu=CUploadedFile::getInstance($model,'filee');
			$path='/../jadwal_keg.xls';
			$itu->saveAs($path);
			$data = new Spreadsheet_Excel_Reader($path);
			$id=array();
			$nama=array();
			for ($j = 2; $j <= $data->sheets[0]['numRows']; $j++) 
			{
				$id[$j]=$data->sheets[0]['cells'][$j][1];
				$nama[$j]=$data->sheets[0]['cells'][$j][2];
			}
		
			for($i=0;$i<count($id);$i++)
			{
				$model=new CobaExcel;

				$model->id=$id[$i];
				$model->nama=$keg[$i];
				$model->save();
                       }
                        unlink($path);
			$this->redirect(array('index'));
		}
		$this->render('excel',array('model'=>$model));
	}
	
}