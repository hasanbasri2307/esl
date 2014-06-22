<?php

class ConsultantModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'consultant.models.*',
			'consultant.components.*',
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

	function autoNumber($prefix,$id, $table)
	{
		$kode ='';
		$sql_cek = 'SELECT MAX('.$id.') as max_pref FROM '.$table.' where '.$id.' like "%'.$prefix.'%" ORDER BY '.$id; 
		$sql = 'SELECT MAX(RIGHT('.$id.', 7)) as max_id FROM '.$table.' where '.$id.' like "%'.$prefix.'%" ORDER BY '.$id;
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$command2=$connection->createCommand($sql_cek);
		$result = $command->queryRow();
		$result2 = $command2->queryRow();
		
		
	    if($result2['max_pref'] === NULL)
	    {
	    	$kode = $prefix."0000001";
	    }
	    else
	    {
	    	 $id_max = $result['max_id'];
			$sort_num = (int) substr($id_max, 1, 7);
		    $sort_num++;
	    	$new_code = sprintf("%07s", $sort_num);
	    	$kode = $prefix.$new_code;
	    }
	   
		return $kode; 
	}

	function autoNumberInvoice($prefix,$id, $table)
	{
		$kode ='';
		$sql_cek = 'SELECT MAX('.$id.') as max_pref FROM '.$table.' where '.$id.' like "%'.$prefix.'%" ORDER BY '.$id; 
		$sql = 'SELECT MAX(RIGHT('.$id.', 4)) as max_id FROM '.$table.' where '.$id.' like "%'.$prefix.'%" ORDER BY '.$id;
		$connection=Yii::app()->db;
		$command=$connection->createCommand($sql);
		$command2=$connection->createCommand($sql_cek);
		$result = $command->queryRow();
		$result2 = $command2->queryRow();
		
		
	    if($result2['max_pref'] === NULL)
	    {
	    	$kode = $prefix."0001";
	    }
	    else
	    {
	    	 $id_max = $result['max_id'];
			$sort_num = (int) substr($id_max, 1, 4);
		    $sort_num++;
	    	$new_code = sprintf("%04s", $sort_num);
	    	$kode = $prefix.$new_code;
	    }
	   
		return $kode; 
	}
}
