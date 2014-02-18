<?php

class AccountingModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'accounting.models.*',
			'accounting.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
        public function in_out($val)
	{
                $output= "";
		if($val==1){
                    $output= "Incoming";
                }elseif($val==2){
                    $output= "Outgoing";
                }
		return $output;	
	}
         public function status($val)
	{
                $output= "";
		if($val==1){
                    $output= "Delivered";
                }elseif($val==-1){
                    $output= "Undelivered";
                }
		return $output;	
	}
         public function format_date($d)
	{
                $output= "";
		if(isset($d)){
                    $output= date("Y-m-d",strtotime($d));
                }
		return $output;	
	}
        public function action_inventory($io_id,$status)
	{
            
                //incoming/update/id/2
                $output ="";
               if($status ==0){
                   $output = CHtml::link("update",array("incoming/update/id/".$io_id));
               }
               return $output;
	}
        
}
