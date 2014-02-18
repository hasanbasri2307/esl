<?php

class DefaultController extends RController
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
	public function actionIndex()
	{
		$this->render('index');
	}
}