<?php
require_once('excel_reader2.php');
class ClientController extends RController
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
		$model=new Client('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id'); 
                        $model->changed =$time;
                        $model->created =$time;
                        $model->active =1;
			if($model->save())
				$this->redirect(array('view','id'=>$model->client_id));
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
		$model->scenario='create';
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->client_id));
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
		$criteria=new CDbCriteria();
		$branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
        $criteria->condition ="branch_id=$branch_id ";
        if(isset($search)) 
             $criteria->condition .= " AND  LOWER(`client_number`) LIKE LOWER('%$search%') OR LOWER(`client_number`) LIKE LOWER('%$search%') OR LOWER(`client_name`) LIKE LOWER('%$search%') OR LOWER(`client_name`) LIKE LOWER('%$search%')";
		$count=Client::model()->count($criteria);
    	$pages=new CPagination($count);
    	$pages->pageSize=18;
    	$pages->applyLimit($criteria);
		$client = Client::model()->findAll($criteria);

		$this->render('index',array(
			'client'=>$client,
			'pages' => $pages
		));
	}

	public function actionHistory($client_number=NULL)
	{
		$model=new Client('history');
		$model->unsetAttributes();  // clear any default values

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			if($model->validate())
				$treatment = Person::model()->findByAttributes(array('client'=>$firstName));

				$this->redirect(array('history'));
		}

		$this->render('historycal',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Client('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Client']))
			$model->attributes=$_GET['Client'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Client the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Client::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Client $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionImport()
	{
		$model=new Client('upload');
		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			$itu=CUploadedFile::getInstance($model,'upload');
			$path='/../upload.xls';
			$itu->saveAs($path);
			$data = new Spreadsheet_Excel_Reader($path);

			$x=0;
			$client_name=array();
			$id_card_number=array();
			$client_number= array();
			$dop=array();
			$dob=array();
			$address=array();
			$city=array();
			$zip_code=array();
			$telephone = array();
			$fax_number= array();
			$phone_kantor= array();
			$hp1= array();
			$hp2= array();
			
			$email= array();
			$branch_id= array();
			$date_join= array();
			error_reporting(E_ALL ^ E_NOTICE);
			for ($j = 2; $j <= $data->sheets[0]['numRows']; $j++) 
			{
				
				$client_name[$x]=$data->sheets[0]['cells'][$j][1];
				$id_card_number[$x]=$data->sheets[0]['cells'][$j][2];
				$client_number[$x]=$data->sheets[0]['cells'][$j][3];
				$dop[$x]=$data->sheets[0]['cells'][$j][4];
				$dob[$x]=$data->sheets[0]['cells'][$j][5];
				$address[$x]=$data->sheets[0]['cells'][$j][6];
				$city[$x]=$data->sheets[0]['cells'][$j][7];
				$telephone[$x]=$data->sheets[0]['cells'][$j][8];
				$fax_number[$x]=$data->sheets[0]['cells'][$j][9];
				$phone_kantor[$x]=$data->sheets[0]['cells'][$j][10];
				$hp1[$x]=$data->sheets[0]['cells'][$j][11];
				$hp2[$x]=$data->sheets[0]['cells'][$j][12];
				$email[$x]=$data->sheets[0]['cells'][$j][13];
				$branch_id[$x]=$data->sheets[0]['cells'][$j][14];
				$date_join[$x]=$data->sheets[0]['cells'][$j][15];
				$x++;
			}
		
			for($i=0;$i<$x;$i++)
			{

				
				$model=new Client('upload');
				$model->client_name = $client_name[$i];
				$model->id_card_number=$id_card_number[$i];
				$model->client_number=$client_number[$i];
				$model->dop=$dop[$i];
				$model->dob=$dob[$i];
				$model->address=$address[$i];
				$model->city=$city[$i];
				$model->telephone=$telephone[$i];
				$model->fax_number=$fax_number[$i];
				$model->phone_kantor=$phone_kantor[$i];
				$model->hp1=$hp1[$i];
				$model->hp2=$hp2[$i];
				$model->email=$email[$i];
				$model->branch_id=$branch_id[$i];
				$model->date_join=$date_join[$i];

				$model->save();
					
				
            }
                        unlink($path);
						
                        Yii::app()->user->setFlash('alert','<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>

										<strong>
											<i class="icon-remove"></i>
											Success !!
										</strong>

										Client Berhasil Di import
										<br>
									</div>');
                        $this->redirect(array('import'));
						
			
		}
		$this->render('import',array('model'=>$model));
	}
}
