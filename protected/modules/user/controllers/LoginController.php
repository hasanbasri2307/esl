<?php

class LoginController extends RController
{
	public $defaultAction = 'login';
  public $layout='//layouts/login';
  
	public function filters()
	{
		 return array( 
                      'rights', 
                       array('ext.activityLog.QLogFilter','logCategory'=>'Backend','logLevel'=>'action'),
                   ); 
	}

	public function allowedActions() 
        { 
           return 'login'; 
        } 
	public function actionLogin()
	{
		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;
			// collect user input data
			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
					$this->lastViset();
					if (Yii::app()->user->returnUrl=='/index.php'){
						$this->redirect(Yii::app()->request->baseUrl);
                                        }else{
                                            echo Yii::app()->request->baseUrl;
						
                                                $this->redirect(Yii::app()->createUrl('site'));
                                             

                                        }
				}
			}
			// display the login form
			$this->render('/user/login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit = time();
		$lastVisit->save();
	}

}