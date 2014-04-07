<?php
require_once('excel_reader2.php');
class ClientController extends RController
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
            return ''; 
        } 
	public function actionView($id)
	{
		$model = $this->loadModel($id);
		$model_ch=ClientHistory::model()->findByAttributes(array('client_id'=>$model->client_id));
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'model_ch' =>$model_ch,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Client('create');
		$model_ch = new ClientHistory('create');

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
						$prefix = Yii::app()->getModule('user')->user()->profile->branch->getAttribute('branch_number');
                        $time = time();
                        $model->user_id =Yii::app()->getModule('user')->user()->id;
                        $model->branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id'); 
                        $model->changed =$time;
                        $model->created =$time;
                        $model->client_middle_name = $_POST['Client']['client_middle_name'];
                        $model->client_last_name = $_POST['Client']['client_last_name'];
                        $model->title = $_POST['Client']['title'];
                        $model->pin_bbm = $_POST['Client']['pin_bbm'];
                        $model->description = $_POST['Client']['description'];
                        $model->client_number = Yii::app()->getModule('consultant')->autoNumber("ESL-".$prefix.'-',"client_number","esc_client"); 
                        $model->active =1;
                        $model->save();

                        $model_ch->attributes=$_POST['ClientHistory'];
                        $model_ch->client_id =$model->client_id;
                        $model_ch->user_id =Yii::app()->getModule('user')->user()->id;
                        $model_ch->changed =$time;
                        $model_ch->created =$time;
                        $model_ch->rekam_medik_id =Yii::app()->getModule('consultant')->autoNumber("RM","rekam_medik_id","esc_client_history"); 

                        if(isset($_POST['Client']['filename']))
							$model->pict = $_POST['Client']['filename'];
			if($model_ch->save())
				$this->redirect(array('view','id'=>$model->client_id));
		}

		$this->render('create',array(
			'model'=>$model,
			'model_ch'=>$model_ch,
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
		$model_ch->scenario='create';
		$model_ch=ClientHistory::model()->findByAttributes(array('client_id'=>$model->client_id));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Client']) && isset($_POST['ClientHistory']))
		{
			$time = time();
			$model->attributes=$_POST['Client'];
			  $model_ch->attributes=$_POST['ClientHistory'];
              
                        $model_ch->changed =$time;
                        
			if(isset($_POST['Client']['filename']))
				$model->pict = $_POST['Client']['filename'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->client_id));
		}

		$this->render('update',array(
			'model'=>$model,
			'model_ch'=>$model_ch,
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
             $criteria->condition = "branch_id=$branch_id  AND  LOWER(`client_number`) LIKE LOWER('%$search%') OR LOWER(`client_number`) LIKE LOWER('%$search%') OR LOWER(`client_name`) LIKE LOWER('%$search%') OR LOWER(`client_name`) LIKE LOWER('%$search%')";
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
		$prefix = Yii::app()->getModule('user')->user()->profile->branch->getAttribute('branch_number');
		$model=new Client('upload');
		$model2 = new ClientHistory('upload');
		if(isset($_POST['Client']))
		{
			$model->attributes=$_POST['Client'];
			
			$itu=CUploadedFile::getInstance($model,'upload');
			$path='/../upload.xls';
			$itu->saveAs($path);
			$data = new Spreadsheet_Excel_Reader($path);

			$x=0;
			$client_name=array();
			$client_middle_name=array();
			$client_last_name=array();
			$title=array();
			$id_card_number=array();
			$dop=array();
			$dob=array();
			$address=array();
			$city=array();
			$zip_code=array();
			$telephone = array();
			$fax_number= array();
			$pin_bbm=array();
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
				$client_middle_name[$x]=$data->sheets[0]['cells'][$j][2];
				$client_last_name[$x]=$data->sheets[0]['cells'][$j][3];
				$title[$x] = $data->sheets[0]['cells'][$j][4];
				$id_card_number[$x]=$data->sheets[0]['cells'][$j][5];
				$dop[$x]=$data->sheets[0]['cells'][$j][6];
				$dob[$x]=$data->sheets[0]['cells'][$j][7];
				$address[$x]=$data->sheets[0]['cells'][$j][8];
				$city[$x]=$data->sheets[0]['cells'][$j][9];
				$zip_code[$x]=$data->sheets[0]['cells'][$j][10];
				$telephone[$x]=$data->sheets[0]['cells'][$j][11];
				$fax_number[$x]=$data->sheets[0]['cells'][$j][12];
				$phone_kantor[$x]=$data->sheets[0]['cells'][$j][13];
				$hp1[$x]=$data->sheets[0]['cells'][$j][14];
				$hp2[$x]=$data->sheets[0]['cells'][$j][15];
				$pin_bbm[$x]=$data->sheets[0]['cells'][$j][16];
				$email[$x]=$data->sheets[0]['cells'][$j][17];
				$branch_id[$x]=$data->sheets[0]['cells'][$j][18];
				$date_join[$x]=$data->sheets[0]['cells'][$j][19];
				$x++;
			}
		
			for($i=0;$i<$x;$i++)
			{

				
				$model=new Client('upload');
				$model->client_name = $client_name[$i];
				$model->client_middle_name = $client_middle_name[$i];
				$model->client_last_name = $client_last_name[$i];
				$model->title = $title[$i];
				$model->id_card_number=$id_card_number[$i];
				$model->client_number=Yii::app()->getModule('consultant')->autoNumber("ESL-".$prefix.'-',"client_number","esc_client"); 
				$model->dop=$dop[$i];
				$model->dob=$dob[$i];
				$model->address=$address[$i];
				$model->city=$city[$i];
				$model->zip_code=$zip_code[$i];
				$model->telephone=$telephone[$i];
				$model->fax_number=$fax_number[$i];
				$model->phone_kantor=$phone_kantor[$i];
				$model->hp1=$hp1[$i];
				$model->hp2=$hp2[$i];
				$model->pin_bbm=$pin_bbm[$i];
				$model->email=$email[$i];
				$model->branch_id=$branch_id[$i];
				$model->date_join=$date_join[$i];

				$model->save();
				
				$model2 = new ClientHistory('upload');
				$model2->client_id = $model->client_id;
				$model2->rekam_medik_id = Yii::app()->getModule('consultant')->autoNumber("RM","rekam_medik_id","esc_client_history"); 
				$model2->save();
				
				
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
		$this->render('import',array('model'=>$model,'model2'=>$model2));
	}
}
