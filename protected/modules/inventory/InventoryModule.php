<?php

class InventoryModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'inventory.models.*',
			'inventory.components.*',
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
       public function testaja($data=array()){
           $output="";
           foreach ($data as $row => $val)
           {    
               foreach ($val as $row2 => $val2){
                   $output.=array_shift($val2);
                    
               }
                
           }
           return $output;
        }
}
