<?php

class DefaultController extends RController
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
	public function actionIndex()
	{
		$this->render('index');
	}
}