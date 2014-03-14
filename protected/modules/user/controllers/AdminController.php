<?php
require_once('excel_reader2.php');
class AdminController extends RController
{
	
	public $defaultAction = 'admin';
	
	
	private $_model;

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

	/**
	 * Manages all models.
	 */
	public function actionAdmin($search=NULL)
	{
		
                 $criteria = new CDbCriteria; 
                if(isset($search)) 
                    $criteria->condition = " LOWER(`name`) LIKE LOWER('%$search%') OR LOWER(`name`) LIKE LOWER('%$search%') OR LOWER(`username`) LIKE LOWER('%$search%') OR LOWER(`username`) LIKE LOWER('%$search%')";
                $sort = new CSort;
                $sort->defaultOrder = array(
                  'username'=>CSort::SORT_ASC,

                );
		
		$dataProvider=new CActiveDataProvider('User', array(
		
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
		$model=new User;
		$profile=new Profile;
                $auth_assignment=new AuthAssignment;
		$this->performAjaxValidation(array($model,$profile));
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
			$profile->attributes=$_POST['Profile'];
			$profile->user_id=0;
			if($model->validate()&&$profile->validate()) {
				$model->password=Yii::app()->controller->module->encrypting($model->password);
				if($model->save()) {
					$profile->user_id=$model->id;
					$profile->save();
                                        $auth_assignment->attributes=$_POST['AuthAssignment'];
                                        $auth_assignment->userid=$model->id;
                                        $auth_assignment->data='N;';
                                        $auth_assignment->save();
				}
				$this->redirect(array('view','id'=>$model->id));
			} else $profile->validate();
		}

		$this->render('create',array(
			'model'=>$model,
			'profile'=>$profile,
                        'auth_assignment'=>$auth_assignment,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$profile=$model->profile;
                $auth_assignment=$model->auth_assignment;
		$this->performAjaxValidation(array($model,$profile));
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			$auth_assignment->attributes=$_POST['AuthAssignment'];
			if($model->validate()&&$profile->validate()&&$auth_assignment->validate()) {
				$old_password = User::model()->notsafe()->findByPk($model->id);
				if ($old_password->password!=$model->password) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);
					$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
				}
				$model->save();
				$profile->save();
                                $auth_assignment->save();
				$this->redirect(array('view','id'=>$model->id));
			} else $profile->validate();
		}

		$this->render('update',array(
			'model'=>$model,
			'profile'=>$profile,
                        'auth_assignment'=>$auth_assignment
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
			$profile = Profile::model()->findByPk($model->id);
			$profile->delete();
                        $auth_assignment = AuthAssignment::model()->find(array("condition"=>"userid=$model->id"));

			$auth_assignment->delete();
			$model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('/user/admin'));
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
				$this->_model=User::model()->notsafe()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	

	//import data excel to mysql

	public function actionImport()
	{
		$model=new Profiles('upload');
		if(isset($_POST['Profiles']))
		{
			$model->attributes=$_POST['Profiles'];
			$itu=CUploadedFile::getInstance($model,'upload');
			$path='/../upload.xls';
			$itu->saveAs($path);
			$data = new Spreadsheet_Excel_Reader($path);

			$x=0;
			$name=array();
			$dob=array();
			$address= array();
			$phone=array();
			$branch_id=array();
			$id_divisi=array();
			$id_level_jabatan=array();
			$id_jabatan=array();
			$username = array();
			$password= array();
			error_reporting(E_ALL ^ E_NOTICE);
			for ($j = 2; $j <= $data->sheets[0]['numRows']; $j++) 
			{
				
				$name[$x]=$data->sheets[0]['cells'][$j][1];
				$dob[$x]=$data->sheets[0]['cells'][$j][2];
				$address[$x]=$data->sheets[0]['cells'][$j][3];
				$phone[$x]=$data->sheets[0]['cells'][$j][4];
				$branch_id[$x]=$data->sheets[0]['cells'][$j][5];
				$id_divisi[$x]=$data->sheets[0]['cells'][$j][6];
				$id_level_jabatan[$x]=$data->sheets[0]['cells'][$j][7];
				$id_jabatan[$x]=$data->sheets[0]['cells'][$j][8];
				$username[$x]=$data->sheets[0]['cells'][$j][9];
				$password[$x]=$data->sheets[0]['cells'][$j][10];
				$x++;
			}
		
			for($i=0;$i<$x;$i++)
			{

				$model2 = new User;
				$model2->status=1;
				$model2->username=$username[$i];
				$model2->password= md5($password[$i]);
				$model2->save();


				$model=new Profiles('upload');
				$model->user_id = $model2->id;
				$model->name=$name[$i];
				$model->dob=$dob[$i];
				$model->address=$address[$i];
				$model->phone=$phone[$i];
				$model->branch_id=$branch_id[$i];
				$model->id_divisi=$id_divisi[$i];
				$model->id_level_jabatan=$id_level_jabatan[$i];
				$model->id_jabatan=$id_jabatan[$i];

				$model->save();
				$auth_assignment = new AuthAssignment;
								 $auth_assignment->itemname='Administrator';
                                        $auth_assignment->userid=$model2->id;
                                        $auth_assignment->data='N;';
                                        $auth_assignment->save();

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

										User Berhasil Di import
										<br>
									</div>');
                        $this->redirect(array('import'));
			
		}
		$this->render('import',array('model'=>$model));
	}
}