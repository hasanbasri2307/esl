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
             return 'autocomplete_client_number'; 
        } 
	public function actionIndex()
	{
		if(isset($_GET['Client_number']) && isset($_GET['Client_id'])){
			$branch_id =Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
			$client_id = $_GET['Client_number'];
			$model=Client::model()->find(array("condition"=>"client_number='$client_id' AND branch_id=$branch_id "));
			$this->render('index',array('model'=>$model));
		}else{
			$this->render('index');
		}
		
	}
	public function actionAutocomplete_client_number()
      {		
		$branch_id = Yii::app()->getModule('user')->user()->profile->getAttribute('branch_id');
                
               
		if($branch_id>0){
			
		 if (Yii::app()->request->isAjaxRequest && isset($_GET['term'])) {
                    $search = strtolower($_GET["term"]);
                    
                    $criteria = new CDbCriteria;
                    if(isset($search))   
                        $criteria->condition = " LOWER(`client_number`) LIKE LOWER('%$search%') AND branch_id=$branch_id";
                     $client = Client::model()->findAll($criteria);
                      foreach ($client as $row=>$val){
                         $output[] =  array("label"=>$val->client_number, "value"=>$val->client_id,  "value2"=>$val->client_name);
                      }
                     
                    
                }
                   
				echo CJSON::encode($output);   
		}
              
              
              
        }
}